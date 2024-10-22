<?php
include 'koneksi.php';

// seeder tbl_riwayat
// for($i = 1; $i <= 1; $i++) {
//     mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P51', '2023-10-02')");
// }


// seeder tbl_gejala
// for($i = 1; $i <= 17; $i++) {
//     if($i < 10) {
//         $id = 'G0'.$i;
//     } else {
//         $id = 'G'.$i;
//     }
//     mysqli_query($koneksi, "INSERT INTO tbl_gejala  VALUES (, NULL, 'H03', 'P03', '2023-10-02')");
// }

// ssder tbl_statistik_penyakit
// mysqli_query($koneksi, "INSERT INTO tbl_jenis_penyakit  VALUES 
// ('P01','Cacingan'),
// ('P02','Mastitis'),
// ('P03','Orf'),
// ('P04','Pneumonia'),
// ('P05','Pink Aye'),
// ('P06','Scabies'),
// ('P07','Foot root'),
// ('P08','Kembung'),
// ('P09','Miasis'),
// ('P10','Malnutrisi'),
// ('P11','Enteritis'),
// ('P12','Penyakit Mulut dan Kuku'),
// ('P13','Feline calicivirus'),
// ('P14','Feline Lower Urinary Tractus Disease'),
// ('P15','Hepatic Lipidosis'),
// ('P16','Baliziekte'),
// ('P17','Septichaemia Epizootica'),
// ('P18','Bovine Ephemeral Fever'),
// ('P19','Bovine Viral Diarrhea'),
// ('P20','Kekurangan Calsium'),
// ('P21','Keracunan'),
// ('P22','Konjunctivitis'),
// ('P23','Laminitis'),
// ('P24','Malignant Catarrhal Fever')");


// seeder tbl_riwayat
// Kambing - Cacingan
for($i = 1; $i <= 350; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H03', 'P01', '2023-10-02')");
}

// Sapi - Cacingan
for($i = 1; $i <= 936; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P01', '2023-10-02')");
}

// Kambing - Mastitis
for($i = 1; $i <= 81; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H03', 'P02', '2023-10-02')");
}

// Sapi - Mastitis
for($i = 1; $i <= 9; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P02', '2023-10-02')");
}


// Kambing - Orf
for($i = 1; $i <= 17; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H03', 'P03', '2023-10-02')");
}

// Sapi - Orf
for($i = 1; $i <= 3; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P03', '2023-10-02')");
}

// Kambing - Pneumonia
for($i = 1; $i <= 8; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H03', 'P04', '2023-10-02')");
}

// Sapi - Pneumonia
for($i = 1; $i <= 47; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P04', '2023-10-02')");
}

// Kambing - Pink Aye
for($i = 1; $i <= 407; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H03', 'P05', '2023-10-02')");
}

// Sapi - Pink Aye
for($i = 1; $i <= 131; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P05', '2023-10-02')");
}

// Kambing - Scabies
for($i = 1; $i <= 7; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H01', 'P06', '2023-10-02')");
}

// Kambing - Scabies
for($i = 1; $i <= 277; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H03', 'P06', '2023-10-02')");
}

// Kucing - Scabies
for($i = 1; $i <= 19; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H04', 'P06', '2023-10-02')");
}

// Sapi - Scabies
for($i = 1; $i <= 72; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P06', '2023-10-02')");
}

// Kambing - Foot Root
for($i = 1; $i <= 53; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H03', 'P07', '2023-10-02')");
}

// Sapi - Foot Root
for($i = 1; $i <= 33; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P07', '2023-10-02')");
}

// Ayam - kembung
for($i = 1; $i <= 42; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H02', 'P08', '2023-10-02')");
}

// Kambing - kembung
for($i = 1; $i <= 2403; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H03', 'P08', '2023-10-02')");
}

// Sapi - kembung
for($i = 1; $i <= 2340; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P08', '2023-10-02')");
}

// Sapi - Miasis
for($i = 1; $i <= 29; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P09', '2023-10-02')");
}

// Anjing - Malnutrisi
for($i = 1; $i <= 3; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H01', 'P10', '2023-10-02')");
}
// Ayam - Malnutrisi
for($i = 1; $i <= 3; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H02', 'P10', '2023-10-02')");
}
// Sapi - Malnutrisi
for($i = 1; $i <= 1; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P10', '2023-10-02')");
}

// Sapi - Enteritis
for($i = 1; $i <= 46; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P11', '2023-10-02')");
}

// Sapi - Penyakit Mulut dan Kuku
for($i = 1; $i <= 8; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P12', '2023-10-02')");
}

// Sapi - Feline calicivirus
for($i = 1; $i <= 1; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H04', 'P13', '2023-10-02')");
}

// Sapi - Feline Lower Urinary Tractus Disease
for($i = 1; $i <= 1; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H04', 'P14', '2023-10-02')");
}

// Sapi - Hepatic Lipidosis
for($i = 1; $i <= 2; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H04', 'P15', '2023-10-02')");
}

// Sapi - Penyakit Mulut dan Kuku
for($i = 1; $i <= 17; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P16', '2023-10-02')");
}

// Sapi - Penyakit Mulut dan Kuku
for($i = 1; $i <= 5; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H01', 'P17', '2023-10-02')");
}

// Sapi - Penyakit Mulut dan Kuku
for($i = 1; $i <= 30; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P18', '2023-10-02')");
}

// Sapi - Penyakit Mulut dan Kuku
for($i = 1; $i <= 26; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P19', '2023-10-02')");
}

// Sapi - Penyakit Mulut dan Kuku
for($i = 1; $i <= 19; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P20', '2023-10-02')");
}

// Sapi - Penyakit Mulut dan Kuku
for($i = 1; $i <= 24; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P21', '2023-10-02')");
}
// Sapi - Penyakit Mulut dan Kuku
for($i = 1; $i <= 5; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H02', 'P22', '2023-10-02')");
}

// Sapi - Penyakit Mulut dan Kuku
for($i = 1; $i <= 5; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H05', 'P22', '2023-10-02')");
}

// Sapi - Penyakit Mulut dan Kuku
for($i = 1; $i <= 1; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H01', 'P23', '2023-10-02')");
}

// Sapi - Penyakit Mulut dan Kuku
for($i = 1; $i <= 2; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H02', 'P23', '2023-10-02')");
}

// Sapi - Penyakit Mulut dan Kuku
for($i = 1; $i <= 1; $i++) {
    mysqli_query($koneksi, "INSERT INTO tbl_riwayat  VALUES (NULL, NULL, 'H01', 'P24', '2023-10-02')");
}

echo 'Seeder Berhasil';
