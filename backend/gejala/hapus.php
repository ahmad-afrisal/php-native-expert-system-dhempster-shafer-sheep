<?php
session_start();

if (isset($_GET['kode_gejala'])) {

    include '../../includes/koneksi.php'; // Pastikan $koneksi sudah dibuat di file koneksi.php

    $kode_gejala = $_GET['kode_gejala'];

    // Menggunakan prepared statement untuk penghapusan
    $stmt = $koneksi->prepare("DELETE FROM tbl_gejala WHERE kode_gejala = ?");
    $stmt->bind_param("s", $kode_gejala);

    try {
        if ($stmt->execute()) {
            // Jika berhasil dihapus, tampilkan pesan sukses
            $_SESSION['flash_message'] = "Gejala $kode_gejala Berhasil dihapus!";
            header('Location: index.php?status=success');
        }
    } catch (mysqli_sql_exception $e) {
        // Jika terjadi error, misalnya foreign key constraint error
        if ($e->getCode() == 1451) {  // Error 1451 adalah kode untuk foreign key constraint
            $_SESSION['flash_message'] = "Data ini tidak bisa dihapus, karena memiliki hubungan dengan data lain!";
        } else {
            $_SESSION['flash_message'] = "Gagal menghapus record dengan kode $kode_gejala!";
        }
        header('Location: index.php?status=error');
        exit(); // Pastikan exit setelah redirect
    }

    // Tutup statement
    $stmt->close();

    // Tutup koneksi
    $koneksi->close();

} else {
    // $_SESSION['flash_message'] = "Failed to delete record!";
    // header('Location: index.php?status=error');
    // exit();
}

exit();
?>
