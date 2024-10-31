
<?php
session_start();
include '../../includes/koneksi.php';



$judul_foto = htmlspecialchars($_POST['judul_foto'], ENT_QUOTES, 'UTF-8');

$files = $_FILES;
$jumlahFile = count($files['foto']['name']);




// if(!in_array($ext,$ekstensi) ) {
// 	// header("location:index.php?alert=gagal_ekstensi");
// }else{
	// if($ukuran < 1044070){	
    // Nonaktifkan autocommit untuk mulai transaksi
        $koneksi->autocommit(FALSE);

        try {
            $sql_foto = "INSERT INTO tbl_galeri_foto (judul_foto) VALUES (?)";
            $stmt_foto = $koneksi->prepare($sql_foto);
            $stmt_foto->bind_param("s", $judul_foto,);
            $stmt_foto->execute();

            // query INSERT gambar
            $query = mysqli_query($koneksi, "SELECT id FROM tbl_galeri_foto ORDER BY id  DESC LIMIT 1");
            $result = mysqli_fetch_array($query);
            $id  = $result['id'];

            $folderUpload = "../../frontend/img/foto/";


            # periksa apakah folder tersedia
            if (!is_dir($folderUpload)) {
                # jika tidak maka folder harus dibuat terlebih dahulu
                mkdir($folderUpload, 0777, $rekursif = true);
            }

            for ($i = 0; $i < $jumlahFile; $i++) {
                $namaFile = $files['foto']['name'][$i];
                $lokasiTmp = $files['foto']['tmp_name'][$i];

                $namaBaru = uniqid() . '-' . $namaFile;
                $lokasiBaru = "{$folderUpload}/{$namaBaru}";
                $prosesUpload = move_uploaded_file($lokasiTmp, $lokasiBaru);

                # jika proses berhasil
                if ($prosesUpload) {
                    mysqli_query($koneksi,"INSERT INTO tbl_galeri_foto_detail VALUES (NULL, '$id', '$namaBaru')");
                    // header("location:index.php?alert=simpan");
                } else {
                    // header("location:index.php?alert=gagal");
                }
            }


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
        // $stmt->close();

        // Aktifkan kembali autocommit
        $koneksi->autocommit(TRUE);

        // Tutup koneksi
        $koneksi->close();

        header('Location: index.php?status='.$status.'');
    // } else {
	// 	header("location:index.php?alert=gagak_ukuran");
	// }

// }

?>
