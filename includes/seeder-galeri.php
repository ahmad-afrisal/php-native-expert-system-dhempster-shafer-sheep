<?php
include 'koneksi.php';

// seeder tbl_riwayat
for($i = 2; $i <= 4; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_galeri  VALUES (NULL, 'gallery-".$i.".jpg','potrait')");
}

for($i = 5; $i <= 8; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_galeri  VALUES (NULL, 'gallery-".$i.".jpg','landscape')");
}
