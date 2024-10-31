<?php
session_start();

if (isset($_GET['id'])) {

    include '../../includes/koneksi.php'; // Pastikan $koneksi sudah dibuat di file koneksi.php

    $id = $_GET['id'];
    $status = 'error';

       // Nonaktifkan autocommit untuk mulai transaksi
    $koneksi->autocommit(FALSE);

    try {
        // Hapus data dari tabel relasi
        $sql = "DELETE FROM tbl_galeri_foto WHERE id = ?";
        $stmt = $koneksi->prepare($sql);
        $stmt->bind_param("s", $id);
        $stmt->execute();


        // Jika semua berhasil, commit transaksi
        $koneksi->commit();
        
        // Jika berhasil dihapus, tampilkan pesan sukses
        $_SESSION['flash_message'] = "Data Berhasil dihapus!";
        // header('Location: index.php?status=success');
        $status = 'success';
    } catch (Exception $e) {
        // Rollback jika ada kesalahan
        $koneksi->rollback();
        // Jika terjadi error, misalnya foreign key constraint error
        if ($koneksi->errno == 1451) {  // Error 1451 adalah kode untuk foreign key constraint
            $_SESSION['flash_message'] = "Data ini tidak bisa dihapus, karena memiliki hubungan dengan data lain!";
        } else {
            $_SESSION['flash_message'] = "Gagal menghapus record dengan id $id!";
        }
        $status = 'error';
        
    }

    // Tutup statement
    $stmt->close();

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