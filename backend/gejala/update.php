<?php
    session_start();
    include '../../includes/koneksi.php';

    // Mengambil input dari form dan membersihkan dari XSS
    $kode_gejala = $_POST['kode_gejala'];
    $nama_gejala = htmlspecialchars($_POST['nama_gejala'], ENT_QUOTES, 'UTF-8');
    
    // Menggunakan prepared statement untuk mencegah SQL Injection
    $stmt = $koneksi->prepare("UPDATE tbl_gejala SET nama_gejala= ? WHERE kode_gejala = ?");
    $stmt->bind_param("ss", $nama_gejala, $kode_gejala);

    // Eksekusi query
    if ($stmt->execute()) {
        // Membuat Flash message
        $_SESSION['flash_message'] = "Gejala Berhasil diperbaharui!";

        // Redirect ke halaman utama jika berhasil
        header('Location: index.php?status=success');
    } else {
        // Membuat Flash message
        $_SESSION['flash_message'] = "Gejala Gagal diperbaharui!";

        // Redirect ke halaman utama jika gagal
        header('Location: index.php?status=error');
    }

// Tutup statement
$stmt->close();