<?php
    session_start();
    include '../../includes/koneksi.php';

    // mysqli_query($koneksi, "UPDATE tbl_penyakit SET nama_penyakit='$nama_penyakit', keterangan='$keterangan', pencegahan='$pencegahan', kode_gejala='$gejala' WHERE kode_penyakit='$kode_penyakit'");

    $gejala = $_POST['gejala'];
    $kode_penyakit = $_POST['kode_penyakit'];

    // Array untuk menyimpan pesan error
    $errors = [];

    if(count($gejala) < 5) {
        // Simpan pesan error ke session
        $_SESSION['flash_message'] = "Minimal memilih 5 gejala";
        
        header('Location: edit.php?kode_penyakit='.$kode_penyakit.'');
        exit();
    }


    // Mengambil input dari form dan membersihkan dari XSS
    $nama_penyakit = htmlspecialchars($_POST['nama_penyakit'], ENT_QUOTES, 'UTF-8');
    $keterangan= htmlspecialchars($_POST['keterangan'], ENT_QUOTES, 'UTF-8');
    $pencegahan = ($_POST['pencegahan']);


   // Nonaktifkan autocommit untuk mulai transaksi
    $koneksi->autocommit(FALSE);

    try {

        // 1. Update data di tabel penyakit
        $stmt = $koneksi->prepare("UPDATE tbl_penyakit SET nama_penyakit = ?, keterangan = ?, pencegahan = ? WHERE kode_penyakit = ?");
        $stmt->bind_param("ssss", $nama_penyakit, $keterangan, $pencegahan, $kode_penyakit);
        $stmt->execute();


        // 2. Hapus semua relasi lama dari tabel pivot (tbl_relasi)
        $delete_stmt = $koneksi->prepare("DELETE FROM tbl_relasi WHERE kode_penyakit = ?");
        $delete_stmt->bind_param("s", $kode_penyakit);
        $delete_stmt->execute();

        // 3. Tambahkan relasi baru ke tabel pivot (tbl_relasi)
        if (!empty($gejala)) {
            foreach ($gejala as $g) {
                $insert_stmt = $koneksi->prepare("INSERT INTO tbl_relasi (kode_penyakit, kode_gejala) VALUES (?, ?)");
                $insert_stmt->bind_param("ss", $kode_penyakit, $g);
                $insert_stmt->execute();
            }
        }

        $stmt->close();
        $delete_stmt->close();
        if (isset($insert_stmt)) {
            $insert_stmt->close();
        }
    

        // Jika semua berhasil, commit transaksi
        $koneksi->commit();
        
        // Jika berhasil dihapus, tampilkan pesan sukses
        $_SESSION['flash_message'] = "Penyakit  berhasil diperbaharui!";

        header('Location: index.php?status=success');
        $status = 'success';
    } catch (Exception $e) {
        // Rollback jika ada kesalahan
        $koneksi->rollback();
        // Jika terjadi error, misalnya foreign key constraint error
        if ($koneksi->errno == 1451) {  // Error 1451 adalah kode untuk foreign key constraint
            $_SESSION['flash_message'] = "Data ini tidak bisa dihapus, karena memiliki hubungan dengan data lain!";
        } else {
            $_SESSION['flash_message'] = "Data gagal diperbaharui";
        }
        $status = 'error';
        
    }

    // Aktifkan kembali autocommit
    $koneksi->autocommit(TRUE);

    // Tutup koneksi
    $koneksi->close();

    header('Location: index.php?status='.$status.'');



?>
