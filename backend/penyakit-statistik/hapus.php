<?php
session_start();

if (isset($_GET['kode_penyakit'])) {

    include '../../includes/koneksi.php'; // Pastikan $koneksi sudah dibuat di file koneksi.php

    $kode_penyakit = $_GET['kode_penyakit'];
    $status = 'error';

       // Nonaktifkan autocommit untuk mulai transaksi
    $koneksi->autocommit(FALSE);

    try {
        // Hapus data dari tabel tbl_penyakit
        $sql_penyakit = "DELETE FROM tbl_jenis_penyakit WHERE kode_penyakit = ?";
        $stmt_penyakit = $koneksi->prepare($sql_penyakit);
        $stmt_penyakit->bind_param("s", $kode_penyakit);
        $stmt_penyakit->execute();

        // Jika semua berhasil, commit transaksi
        $koneksi->commit();
        
        // Jika berhasil dihapus, tampilkan pesan sukses
        $_SESSION['flash_message'] = "Hewan dengan kode $kode_penyakit Berhasil dihapus!";
        // header('Location: index.php?status=success');
        $status = 'success';
    } catch (Exception $e) {
        // Rollback jika ada kesalahan
        $koneksi->rollback();
        // Jika terjadi error, misalnya foreign key constraint error
        if ($koneksi->errno == 1451) {  // Error 1451 adalah kode untuk foreign key constraint
            $_SESSION['flash_message'] = "Data ini tidak bisa dihapus, karena memiliki hubungan dengan data lain!";
        } else {
            $_SESSION['flash_message'] = "Gagal menghapus record dengan kode $kode_penyakit!";
        }
        $status = 'error';
        
    }

    // Tutup statement
    $stmt_penyakit->close();

    // Aktifkan kembali autocommit
    $koneksi->autocommit(TRUE);

    // Tutup koneksi
    $koneksi->close();

    header('Location: index.php?status='.$status.'');

} else {
    $_SESSION['flash_message'] = "Data gagal di hapus";
    header('Location: index.php?status=error');
}

exit();
?>