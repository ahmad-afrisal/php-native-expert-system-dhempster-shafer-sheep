
<?php
session_start();
include '../../includes/koneksi.php';

// Mengambil input dari form dan membersihkan dari XSS
$kode_penyakit = htmlspecialchars($_POST['kode_penyakit'], ENT_QUOTES, 'UTF-8');
$nama_penyakit = htmlspecialchars($_POST['nama_penyakit'], ENT_QUOTES, 'UTF-8');
$keterangan= htmlspecialchars($_POST['keterangan'], ENT_QUOTES, 'UTF-8');
$pencegahan = ($_POST['pencegahan']);

$gejala = $_POST['gejala'];

 if(count($gejala) < 5) {
    // Simpan pesan error ke session
    $_SESSION['flash_message'] = "Minimal memilih 5 gejala";
    header('Location: tambah.php?status=warning');
    
    exit();
}

// Cek apakah kode gejala sudah ada di database
$stmt_check = $koneksi->prepare("SELECT * FROM tbl_penyakit WHERE kode_penyakit = ?");
$stmt_check->bind_param("s", $kode_penyakit);
$stmt_check->execute();
$result = $stmt_check->get_result();


if ($result->num_rows > 0) {
    // Jika kode gejala sudah ada, berikan pesan error
    $_SESSION['flash_message'] = "Kode gejala sudah ada. Harap masukkan kode lain.";
    header('Location: index.php?status=duplicate');
} else {
   // Nonaktifkan autocommit untuk mulai transaksi
    $koneksi->autocommit(FALSE);

    try {
        

        // Hapus data dari tabel tbl_penyakit
        $sql_penyakit = "INSERT INTO tbl_penyakit (kode_penyakit, nama_penyakit, keterangan, pencegahan) VALUES (?, ?, ?, ?)";
        $stmt_penyakit = $koneksi->prepare($sql_penyakit);
        $stmt_penyakit->bind_param("ssss", $kode_penyakit, $nama_penyakit, $keterangan, $pencegahan);
        $stmt_penyakit->execute();


        for($i = 0; $i < count($gejala); $i++ ) {
            // Hapus data dari tabel relasi
            $sql_relasi = "INSERT INTO tbl_relasi (kode_penyakit, kode_gejala) VALUES (?, ?)";
            $stmt_relasi = $koneksi->prepare($sql_relasi);
            $stmt_relasi->bind_param("ss", $kode_penyakit, $gejala[$i]);
            $stmt_relasi->execute();
        }

        

        // Jika semua berhasil, commit transaksi
        $koneksi->commit();
        
        // Jika berhasil dihapus, tampilkan pesan sukses
        $_SESSION['flash_message'] = "Penyakit baru berhasil ditambahkan!";
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
    $stmt_penyakit->close();

    // Aktifkan kembali autocommit
    $koneksi->autocommit(TRUE);

    // Tutup koneksi
    $koneksi->close();

    header('Location: index.php?status='.$status.'');

}

?>
