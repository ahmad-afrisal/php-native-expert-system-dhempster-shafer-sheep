<?php
    session_start();
    include '../../includes/koneksi.php';

    $id = $_POST['id'];
    $judul_berita = htmlspecialchars($_POST['judul_berita'], ENT_QUOTES, 'UTF-8');
    $slug = strtolower(str_replace(" ","-", $judul_berita));
    $penulis = htmlspecialchars($_POST['penulis'], ENT_QUOTES, 'UTF-8');
    $isi = $_POST['isi'];
    $statuss = htmlspecialchars($_POST['status'], ENT_QUOTES, 'UTF-8');

    $rand = rand();
    $ekstensi =  array('svg','png','jpg','jpeg','gif');
    $filename = $_FILES['foto']['name'];
    $ukuran = $_FILES['foto']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $foto = '';

    $status = 'error';

    if($_FILES['foto']['error'] === 4) {
         // Menggunakan prepared statement untuk mencegah SQL Injection
        $stmt = $koneksi->prepare("UPDATE tbl_berita SET judul_berita = ?, slug = ?, penulis = ?, isi = ?, status = ?  WHERE id = ?");
        $stmt->bind_param("ssssss", $judul_berita, $slug, $penulis, $isi, $statuss, $id);

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
                move_uploaded_file($_FILES['foto']['tmp_name'], '../../frontend/img/berita/'.$rand.'_'.$filename);
                 // Menggunakan prepared statement untuk mencegah SQL Injection
                $stmt = $koneksi->prepare("UPDATE tbl_berita SET judul_berita = ?, slug = ?, penulis = ?, isi = ?, status = ?, foto = ?  WHERE id = ?");
                $stmt->bind_param("sssssss", $judul_berita, $slug, $penulis, $isi, $statuss, $foto, $id);
                // $stmt = $koneksi->prepare("UPDATE tbl_dokter SET nama_dokter = ?, foto = ?, bidang = ?  WHERE id = ?");
                // $stmt->bind_param("ssss", $nama_dokter, $foto, $bidang, $id);

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
