<?php

// Membuat Koneksi Ke Database
$koneksi = mysqli_connect("localhost","root","","pakar-penyakit-kambing");

// Check apakah koneksi berhasil
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>