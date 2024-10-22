<?php
    session_start();
    include '../../includes/koneksi.php';


    $id = htmlspecialchars($_POST['id'], ENT_QUOTES, 'UTF-8');
    $nama_peternak = htmlspecialchars($_POST['nama_peternak'], ENT_QUOTES, 'UTF-8');
    $kode_hewan = htmlspecialchars($_POST['kode_hewan'], ENT_QUOTES, 'UTF-8');
    $kode_penyakit = htmlspecialchars($_POST['kode_penyakit'], ENT_QUOTES, 'UTF-8');
    $tgl_pemeriksaan = htmlspecialchars($_POST['tgl_pemeriksaan'], ENT_QUOTES, 'UTF-8');

    // Array untuk menyimpan pesan error
    $errors = [];

   // Nonaktifkan autocommit untuk mulai transaksi
    $koneksi->autocommit(FALSE);

    try {

        // 1. Update data di tabel penyakit
        $stmt = $koneksi->prepare("UPDATE tbl_riwayat SET nama_peternak= ?, kode_hewan = ?, kode_penyakit = ?, tgl_pemeriksaan = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $nama_peternak, $kode_hewan, $kode_penyakit, $tgl_pemeriksaan, $id);
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
