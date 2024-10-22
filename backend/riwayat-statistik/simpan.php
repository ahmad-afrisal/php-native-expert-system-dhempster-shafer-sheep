
<?php
session_start();
include '../../includes/koneksi.php';

// Mengambil input dari form dan membersihkan dari XSS
$nama_peternak = htmlspecialchars($_POST['nama_peternak'], ENT_QUOTES, 'UTF-8');
$kode_hewan = htmlspecialchars($_POST['kode_hewan'], ENT_QUOTES, 'UTF-8');
$kode_penyakit = htmlspecialchars($_POST['kode_penyakit'], ENT_QUOTES, 'UTF-8');
$tgl_pemeriksaan = htmlspecialchars($_POST['tgl_pemeriksaan'], ENT_QUOTES, 'UTF-8');

   // Nonaktifkan autocommit untuk mulai transaksi
    $koneksi->autocommit(FALSE);

    try {
        
        // Hapus data dari tabel tbl_penyakit
        $sql_riwayat = "INSERT INTO tbl_riwayat (nama_peternak, kode_hewan, kode_penyakit, tgl_pemeriksaan) VALUES (?, ?, ?, ?)";
        $stmt_riwayat = $koneksi->prepare($sql_riwayat);
        $stmt_riwayat->bind_param("ssss",  $nama_peternak, $kode_hewan, $kode_penyakit, $tgl_pemeriksaan);
        $stmt_riwayat->execute();

        // Jika semua berhasil, commit transaksi
        $koneksi->commit();
        
        // Jika berhasil dihapus, tampilkan pesan sukses
        $_SESSION['flash_message'] = "Riwayat baru berhasil ditambahkan!";
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
    // $stmt_relasi->close();
    $stmt_riwayat->close();

    // Aktifkan kembali autocommit
    $koneksi->autocommit(TRUE);

    // Tutup koneksi
    $koneksi->close();

    header('Location: index.php?status='.$status.'');

?>
