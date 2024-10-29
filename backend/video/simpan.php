<?php
session_start();
include '../../includes/koneksi.php';

// Mengambil input dari form dan membersihkan dari XSS
$kode_gejala = htmlspecialchars($_POST['kode_gejala']);
$nama_gejala = htmlspecialchars($_POST['nama_gejala']);

// Cek apakah kode gejala sudah ada di database
$stmt_check = $koneksi->prepare("SELECT * FROM tbl_gejala WHERE kode_gejala = ?");
$stmt_check->bind_param("s", $kode_gejala);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows > 0) {
    // Jika kode gejala sudah ada, berikan pesan error
    $_SESSION['flash_message'] = "Kode gejala sudah ada. Harap masukkan kode lain.";
    header('Location: index.php?status=duplicate');
} else {
    // Jika kode gejala belum ada, lakukan insert
    $stmt = $koneksi->prepare("INSERT INTO tbl_gejala (kode_gejala, nama_gejala) VALUES (?, ?)");
    $stmt->bind_param("ss", $kode_gejala, $nama_gejala);

    // Eksekusi query
    if ($stmt->execute()) {
        // Membuat Flash message
        $_SESSION['flash_message'] = "Gejala Berhasil ditambahkan!";
        header('Location: index.php?status=success');
    } else {
        // Membuat Flash message
        $_SESSION['flash_message'] = "Gejala Gagal ditambahkan!";
        header('Location: index.php?status=error');
    }

    // Tutup statement
    $stmt->close();
}

// Tutup statement cek
$stmt_check->close();
