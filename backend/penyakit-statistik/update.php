<?php
    session_start();
    include '../../includes/koneksi.php';

    $kode_penyakit = $_POST['kode_penyakit'];

    // Array untuk menyimpan pesan error
    $errors = [];

    // Mengambil input dari form dan membersihkan dari XSS
    $nama_penyakit = htmlspecialchars($_POST['nama_penyakit'], ENT_QUOTES, 'UTF-8');

   // Nonaktifkan autocommit untuk mulai transaksi
    $koneksi->autocommit(FALSE);

    try {

        // 1. Update data di tabel penyakit
        $stmt = $koneksi->prepare("UPDATE tbl_jenis_penyakit SET nama_penyakit = ?  WHERE kode_penyakit = ?");
        $stmt->bind_param("ss", $nama_penyakit, $kode_penyakit);
        $stmt->execute();

        $stmt->close();

        // Jika semua berhasil, commit transaksi
        $koneksi->commit();
        
        // Jika berhasil dihapus, tampilkan pesan sukses
        $_SESSION['flash_message'] = "Penyakit  berhasil diperbaharui!";

        header('Location: index.php?status=success');
        $status = 'success';
    } catch (Exception $e) {
        // Rollback jika ada kesalahan
        $koneksi->rollback();
        // Jika terjadi error, misalnya foreign key constraint error
        if ($koneksi->errno == 1451) {  // Error 1451 adalah kode untuk foreign key constraint
            $_SESSION['flash_message'] = "Data ini tidak bisa dihapus, karena memiliki hubungan dengan data lain!";
        } else {
            $_SESSION['flash_message'] = "Data gagal diperbaharui";
        }
        $status = 'error';
        
    }

    // Aktifkan kembali autocommit
    $koneksi->autocommit(TRUE);

    // Tutup koneksi
    $koneksi->close();

    header('Location: index.php?status='.$status.'');

?>
