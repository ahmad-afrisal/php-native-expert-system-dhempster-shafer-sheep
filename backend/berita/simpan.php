
<?php
session_start();
include '../../includes/koneksi.php';



$judul_berita = htmlspecialchars($_POST['judul_berita'], ENT_QUOTES, 'UTF-8');
$slug = strtolower(str_replace(" ","-", $judul_berita));
$penulis = htmlspecialchars($_POST['penulis'], ENT_QUOTES, 'UTF-8');
$isi = $_POST['isi'];
$waktu_publish = date("Y-m-d");
$status = htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');

$rand = rand();
$ekstensi =  array('svg','png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$foto = '';




if(!in_array($ext,$ekstensi) ) {
	// header("location:index.php?alert=gagal_ekstensi");
}else{
	if($ukuran < 1044070){	
    // Nonaktifkan autocommit untuk mulai transaksi
        $koneksi->autocommit(FALSE);

        try {
            $foto = $rand.'_'.$filename;
		    move_uploaded_file($_FILES['foto']['tmp_name'], '../../frontend/img/berita/'.$rand.'_'.$filename);

            // Hapus data dari tabel tbl_penyakit
            $sql_berita = "INSERT INTO tbl_berita (judul_berita, slug, penulis, foto, isi, waktu_publish, status) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt_berita = $koneksi->prepare($sql_berita);
            $stmt_berita->bind_param("sssssss", $judul_berita, $slug, $penulis, $foto, $isi, $waktu_publish, $status);
            $stmt_berita->execute();

            // Jika semua berhasil, commit transaksi
            $koneksi->commit();
            
            // Jika berhasil dihapus, tampilkan pesan sukses
            $_SESSION['flash_message'] = "Berita baru berhasil ditambahkan!";
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
        $stmt_berita->close();

        // Aktifkan kembali autocommit
        $koneksi->autocommit(TRUE);

        // Tutup koneksi
        $koneksi->close();

        header('Location: index.php?status='.$status.'');
    } else {
		header("location:index.php?alert=gagak_ukuran");
	}

}

?>
