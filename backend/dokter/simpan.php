
<?php
session_start();
include '../../includes/koneksi.php';



$nama_dokter = htmlspecialchars($_POST['nama_dokter'], ENT_QUOTES, 'UTF-8');
$bidang = htmlspecialchars($_POST['bidang'], ENT_QUOTES, 'UTF-8');

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
		    move_uploaded_file($_FILES['foto']['tmp_name'], '../../frontend/img/doctors/'.$rand.'_'.$filename);

            // Hapus data dari tabel tbl_penyakit
            $sql = "INSERT INTO tbl_dokter (nama_dokter, foto, bidang) VALUES (?, ?, ?)";
            $stmt = $koneksi->prepare($sql);
            $stmt->bind_param("sss", $nama_dokter, $foto, $bidang);
            $stmt->execute();

            // Jika semua berhasil, commit transaksi
            $koneksi->commit();
            
            // Jika berhasil dihapus, tampilkan pesan sukses
            $_SESSION['flash_message'] = "Data baru berhasil ditambahkan!";
            // header('Location: index.php?status=success');
            $status = 'success';
        } catch (Exception $e) {
            // Rollback jika ada kesalahan
            $koneksi->rollback();
            // Jika terjadi error, misalnya foreign key constraint error
            if ($koneksi->errno == 1451) {  // Error 1451 adalah kode untuk foreign key constraint
                $_SESSION['flash_message'] = "Data ini tidak bisa dihapus, karena memiliki hubungan dengan data lain!";
            } else {
                $_SESSION['flash_message'] = "Gagal menambahkan data baru";
            }
            $status = 'error';
            
        }

        // Tutup statement
        // $stmt_relasi->close();
        $stmt->close();

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
