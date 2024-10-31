<?php
    session_start();
    include '../../includes/koneksi.php';

    // Mengambil input dari form dan membersihkan dari XSS
    $id = $_POST['id'];
    $judul_foto = htmlspecialchars($_POST['judul_foto'], ENT_QUOTES, 'UTF-8');
    
    // Menggunakan prepared statement untuk mencegah SQL Injection
    $stmt = $koneksi->prepare("UPDATE tbl_galeri_foto SET judul_foto= ? WHERE id = ?");
    $stmt->bind_param("ss", $judul_foto, $id);
    // Eksekusi query
    if ($stmt->execute()) {
        // Membuat Flash message
        $_SESSION['flash_message'] = "Data Berhasil diperbaharui!";

        // Redirect ke halaman utama jika berhasil
        header('Location: index.php?status=success');
    } else {
        // Membuat Flash message
        $_SESSION['flash_message'] = "Data Gagal diperbaharui!";

        // Redirect ke halaman utama jika gagal
        header('Location: index.php?status=error');
    }

// Tutup statement
$stmt->close();