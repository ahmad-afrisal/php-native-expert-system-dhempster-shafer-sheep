
<?php
session_start();
include '../../includes/koneksi.php';

// Mengambil input dari form dan membersihkan dari XSS
$kode_hewan = htmlspecialchars($_POST['kode_hewan'], ENT_QUOTES, 'UTF-8');
$nama_hewan = htmlspecialchars($_POST['nama_hewan'], ENT_QUOTES, 'UTF-8');


// Cek apakah kode gejala sudah ada di database
$stmt_check = $koneksi->prepare("SELECT * FROM tbl_jenis_hewan WHERE kode_hewan = ?");
$stmt_check->bind_param("s", $kode_hewan);
$stmt_check->execute();
$result = $stmt_check->get_result();


if ($result->num_rows > 0) {
    // Jika kode hewan sudah ada, berikan pesan error
    $_SESSION['flash_message'] = "Kode hewan sudah ada. Harap masukkan kode lain.";
    header('Location: index.php?status=duplicate');
} else {
   // Nonaktifkan autocommit untuk mulai transaksi
    $koneksi->autocommit(FALSE);

    try {
        

        // Hapus data dari tabel tbl_penyakit
        $sql_hewan = "INSERT INTO tbl_jenis_hewan (kode_hewan, nama_hewan) VALUES (?, ?)";
        $stmt_hewan = $koneksi->prepare($sql_hewan);
        $stmt_hewan->bind_param("ss", $kode_hewan, $nama_hewan);
        $stmt_hewan->execute();

        

        // Jika semua berhasil, commit transaksi
        $koneksi->commit();
        
        // Jika berhasil dihapus, tampilkan pesan sukses
        $_SESSION['flash_message'] = "Hewan baru berhasil ditambahkan!";
        // header('Location: index.php?status=success');
        $status = 'success';
    } catch (Exception $e) {
        // Rollback jika ada kesalahan
        $koneksi->rollback();
        // Jika terjadi error, misalnya foreign key constraint error
        if ($koneksi->errno == 1451) {  // Error 1451 adalah kode untuk foreign key constraint
            $_SESSION['flash_message'] = "Data ini tidak bisa dihapus, karena memiliki hubungan dengan data lain!";
        } else {
            $_SESSION['flash_message'] = "Gagal menghapus record dengan kode $kode_hewan!";
        }
        $status = 'error';
        
    }

    // Tutup statement
    // $stmt_relasi->close();
    $stmt_hewan->close();

    // Aktifkan kembali autocommit
    $koneksi->autocommit(TRUE);

    // Tutup koneksi
    $koneksi->close();

    header('Location: index.php?status='.$status.'');

}

?>
