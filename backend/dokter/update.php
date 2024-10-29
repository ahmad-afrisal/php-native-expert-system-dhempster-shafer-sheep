<?php
    session_start();
    include '../../includes/koneksi.php';

    // mysqli_query($koneksi, "UPDATE tbl_penyakit SET nama_penyakit='$nama_penyakit', keterangan='$keterangan', pencegahan='$pencegahan', kode_gejala='$gejala' WHERE kode_penyakit='$kode_penyakit'");

    $id = $_POST['id'];
    $nama_dokter = htmlspecialchars($_POST['nama_dokter'], ENT_QUOTES, 'UTF-8');
    $bidang = htmlspecialchars($_POST['bidang'], ENT_QUOTES, 'UTF-8');

    $rand = rand();
    $ekstensi =  array('svg','png','jpg','jpeg','gif');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $foto = '';

    $status = 'error';

    if($_FILES['foto']['error'] === 4) {
         // Menggunakan prepared statement untuk mencegah SQL Injection
        $stmt = $koneksi->prepare("UPDATE tbl_dokter SET nama_dokter = ?, bidang = ?  WHERE id = ?");
        $stmt->bind_param("sss", $nama_dokter, $bidang, $id);

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

    } else {
        
        if(!in_array($ext,$ekstensi) ) {
            header("location:index.php?status=error");
        }else{
            if($ukuran < 1044070){		
                $foto = $rand.'_'.$filename;
                move_uploaded_file($_FILES['foto']['tmp_name'], '../../frontend/img/doctors/'.$rand.'_'.$filename);
                 // Menggunakan prepared statement untuk mencegah SQL Injection
                $stmt = $koneksi->prepare("UPDATE tbl_dokter SET nama_dokter = ?, foto = ?, bidang = ?  WHERE id = ?");
                $stmt->bind_param("ssss", $nama_dokter, $foto, $bidang, $id);

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


            }else{
                header("location:index.php?status=error");
            }
        }
    }







?>
