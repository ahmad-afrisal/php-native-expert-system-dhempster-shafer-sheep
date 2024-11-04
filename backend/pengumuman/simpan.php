
<?php
session_start();
include '../../includes/koneksi.php';



$judul_pengumuman = htmlspecialchars($_POST['judul_pengumuman'], ENT_QUOTES, 'UTF-8');
$keterangan = $_POST['isi'];

$rand = rand();
$ekstensi =  array('pdf','doc','docx','ppt','pptx');
$filename = $_FILES['file']['name'];
$ukuran = $_FILES['file']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$file = '';




if(!in_array($ext,$ekstensi) ) {
	// header("location:index.php?alert=gagal_ekstensi");
    $_SESSION['flash_message'] = "Format tidak sesuai";
    header('Location: index.php?status='.$status.'');

}else{
	if($ukuran < 5044070){	
    // Nonaktifkan autocommit untuk mulai transaksi
        $koneksi->autocommit(FALSE);

        try {
            $file = $rand.'_'.$filename;
		    move_uploaded_file($_FILES['file']['tmp_name'], '../../frontend/files/pengumuman/'.$rand.'_'.$filename);

            // Hapus data dari tabel tbl_penyakit
            $sql_pengumuman = "INSERT INTO tbl_pengumuman (judul_pengumuman, nama_file, keterangan) VALUES (?, ?, ?)";
            $stmt_pengumuman = $koneksi->prepare($sql_pengumuman);
            $stmt_pengumuman->bind_param("sss", $judul_pengumuman, $file, $keterangan);
            $stmt_pengumuman->execute();

            // Jika semua berhasil, commit transaksi
            $koneksi->commit();
            
            // Jika berhasil dihapus, tampilkan pesan sukses
            $_SESSION['flash_message'] = "Pengumuman baru berhasil ditambahkan!";
            // header('Location: index.php?status=success');
            $status = 'success';
        } catch (Exception $e) {
            // Rollback jika ada kesalahan
            $koneksi->rollback();
            // Jika terjadi error, misalnya foreign key constraint error
            if ($koneksi->errno == 1451) {  // Error 1451 adalah kode untuk foreign key constraint
                $_SESSION['flash_message'] = "Data ini tidak bisa dihapus, karena memiliki hubungan dengan data lain!";
            } else {
                $_SESSION['flash_message'] = "Gagal menghapus data";
            }
            $status = 'error';
            
        }

        // Tutup statement
        // $stmt_relasi->close();
        $stmt_pengumuman->close();

        // Aktifkan kembali autocommit
        $koneksi->autocommit(TRUE);

        // Tutup koneksi
        $koneksi->close();

        header('Location: index.php?status='.$status.'');
    } else {
		// header("location:index.php?alert=gagak_ukuran");
        $_SESSION['flash_message'] = "File terlalu besar";
        header('Location: index.php?status='.$status.'');
	}

}

?>
