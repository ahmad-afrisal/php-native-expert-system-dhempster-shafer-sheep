<?php
session_start();

if (isset($_GET['id'])) {

    include '../../includes/koneksi.php'; // Pastikan $koneksi sudah dibuat di file koneksi.php

    $id = $_GET['id'];
    $status = 'error';

       // Nonaktifkan autocommit untuk mulai transaksi
    $koneksi->autocommit(FALSE);

    try {
        // Hapus data dari tabel tbl_riwayat
        $sql_riwayat = "DELETE FROM tbl_riwayat WHERE id = ?";
        $stmt_riwayat = $koneksi->prepare($sql_riwayat);
        $stmt_riwayat->bind_param("s", $id);
        $stmt_riwayat->execute();

        // Jika semua berhasil, commit transaksi
        $koneksi->commit();
        
        // Jika berhasil dihapus, tampilkan pesan sukses
        $_SESSION['flash_message'] = "Hewan dengan kode $id Berhasil dihapus!";
        // header('Location: index.php?status=success');
        $status = 'success';
    } catch (Exception $e) {
        // Rollback jika ada kesalahan
        $koneksi->rollback();
        // Jika terjadi error, misalnya foreign key constraint error
        if ($koneksi->errno == 1451) {  // Error 1451 adalah kode untuk foreign key constraint
            $_SESSION['flash_message'] = "Data ini tidak bisa dihapus, karena memiliki hubungan dengan data lain!";
        } else {
            $_SESSION['flash_message'] = "Gagal menghapus record dengan kode $id!";
        }
        $status = 'error';
        
    }

    // Tutup statement
    $stmt_riwayat->close();

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