-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2024 at 12:31 PM
-- Server version: 5.7.33
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pakar-penyakit-kambing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gejala`
--

CREATE TABLE `tbl_gejala` (
  `kode_gejala` varchar(11) NOT NULL,
  `nama_gejala` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gejala`
--

INSERT INTO `tbl_gejala` (`kode_gejala`, `nama_gejala`) VALUES
('G01', 'Kurang Nafsu Makan'),
('G02', 'Nampak Lesu'),
('G03', 'Gatal-Gatal'),
('G04', 'Ditemukan Di Dekat Punggung, Kuping, Serta Seluruh Badan'),
('G05', 'Fisik Tampak Lemah Dan Lesu'),
('G06', 'Busung Pada Lambung Atau Rumen membesar karena berisi gas'),
('G07', 'Pernapasan Menjadi Lemah'),
('G08', 'Kotoran Berwarna Hitam'),
('G09', 'Bulu Kusam'),
('G10', 'Lepuhan di sekitar mulut, kelopak mata, ambing'),
('G11', 'Kulit Nampak Menebal dan keropeng yang ditemukan di area telinga, leher, telapak kaki, bahkan seluru'),
('G12', 'Sulit Berdiri Atau Ambruk'),
('G13', 'Diare Berkepanjangan'),
('G14', 'Lensa Kadang Keruh'),
('G15', 'Keropeng yang berukuran bervariasi'),
('G16', 'Radang basah'),
('G17', 'Mata Membengkak Dan Merah'),
('G18', 'Bitnik kemerahan, bejol hingga bernanah '),
('G19', 'Mata Lembab Mengeluarkan Air'),
('G20', 'Berat Badan Menurun'),
('G21', 'Konstriksi Pada Pupil'),
('G22', 'Luka Berbau Busuk'),
('G23', 'Keluar Nanah Pada Luka'),
('G24', 'Berkedip-Kedip Atau Tertutup'),
('G25', 'Kulit Sekitar Kaki Mulai Melepuh'),
('G26', 'Peradangan pada sela-sela kaki'),
('G27', 'Suhu Tubuh Naik'),
('G28', 'Pembengkakan Pada Luka'),
('G29', 'Berjalan pincang'),
('G30', 'Luka berbau busuk'),
('G31', 'Pembengkakan Pada Kuku'),
('G32', 'Batuk Parah Sampai Sulit Bernafas'),
('G33', 'Demam Tinggi'),
('G34', 'Hidung Berlendiri'),
('G35', 'Sering Menggaruk'),
('G36', 'Muntah Mengeluarkan Cacing pada anusnya denngan kondisi parah'),
('G37', 'Pernapasan kadang menjadi cepat dan dangkal'),
('G38', 'Tanduk kuku yang cacat'),
('G39', 'Pangkalan ambing memerah'),
('G40', 'Warna air susu bening'),
('G41', 'Kondisi ambing mengeras'),
('G42', 'Pembengkakan pada salah satu ambing kambing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_hewan`
--

CREATE TABLE `tbl_jenis_hewan` (
  `kode_hewan` varchar(11) NOT NULL,
  `nama_hewan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_hewan`
--

INSERT INTO `tbl_jenis_hewan` (`kode_hewan`, `nama_hewan`) VALUES
('H01', 'Anjing'),
('H02', 'Ayam'),
('H03', 'Kambing'),
('H04', 'Kucing'),
('H05', 'Sapi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_penyakit`
--

CREATE TABLE `tbl_jenis_penyakit` (
  `kode_penyakit` varchar(11) NOT NULL,
  `nama_penyakit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_penyakit`
--

INSERT INTO `tbl_jenis_penyakit` (`kode_penyakit`, `nama_penyakit`) VALUES
('P01', 'Cacingan'),
('P02', 'Mastitis'),
('P03', 'Orf'),
('P04', 'Pneumonia'),
('P05', 'Pink Aye'),
('P06', 'Scabies'),
('P07', 'Foot root'),
('P08', 'Kembung'),
('P09', 'Diabetes mellitus'),
('P10', 'Distokia'),
('P11', 'Enteritis'),
('P12', 'Eutokia'),
('P13', 'Feline calicivirus'),
('P14', 'Feline Lower Urinary Tractus Disease'),
('P15', 'Hepatic Lipidosis'),
('P16', 'Infestasi Kutu'),
('P17', 'Jembrana'),
('P18', 'Kecelakaan'),
('P19', 'Keguguran'),
('P20', 'Kekurangan Calsium'),
('P21', 'Keracunan'),
('P22', 'Konjunctivitis'),
('P23', 'Laminitis'),
('P24', 'Malignant Catarrhal Fever'),
('P25', 'Malnutrisi'),
('P26', 'Artritis'),
('P27', 'miasis'),
('P28', 'Mumifikasi'),
('P29', 'Baliziekte'),
('P30', 'Paratuberculosis'),
('P31', 'Penyakit Mulut dan Kuku'),
('P32', 'Bovine Ephemeral Fever'),
('P33', 'Prolap uteri'),
('P34', 'Prolap vagina'),
('P35', 'Pyometra'),
('P36', 'Bovine Viral Diarrhea'),
('P37', 'radang paha'),
('P38', 'Retensio Secundinarum'),
('P39', 'Rift Valley fever'),
('P40', 'Ring Worm'),
('P41', 'Salmonellosis, Coccidiosis'),
('P42', 'Brucellosis'),
('P43', 'Septichaemia Epizootica'),
('P44', 'Silent Heat'),
('P45', 'Tetanus'),
('P46', 'Thelaziasis'),
('P47', 'tidak diketahui'),
('P48', 'Cacingan, Bovine Viral Diarrhea'),
('P49', 'Actinobacillosis'),
('P50', 'Vaginitis'),
('P51', 'Vulnus');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyakit`
--

CREATE TABLE `tbl_penyakit` (
  `kode_penyakit` varchar(11) NOT NULL,
  `nama_penyakit` varchar(100) DEFAULT NULL,
  `keterangan` text NOT NULL,
  `pencegahan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relasi`
--

CREATE TABLE `tbl_relasi` (
  `kode_penyakit` varchar(11) NOT NULL,
  `kode_gejala` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_riwayat`
--

CREATE TABLE `tbl_riwayat` (
  `id` int(11) NOT NULL,
  `nama_peternak` varchar(255) DEFAULT NULL,
  `kode_hewan` varchar(11) NOT NULL,
  `kode_penyakit` varchar(11) NOT NULL,
  `tgl_pemeriksaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_riwayat`
--

INSERT INTO `tbl_riwayat` (`id`, `nama_peternak`, `kode_hewan`, `kode_penyakit`, `tgl_pemeriksaan`) VALUES
(2493, NULL, 'H02', 'P08', '2023-10-02'),
(2494, NULL, 'H02', 'P08', '2023-10-02'),
(2495, NULL, 'H02', 'P08', '2023-10-02'),
(2496, NULL, 'H02', 'P08', '2023-10-02'),
(2497, NULL, 'H02', 'P08', '2023-10-02'),
(2498, NULL, 'H02', 'P08', '2023-10-02'),
(2499, NULL, 'H02', 'P08', '2023-10-02'),
(2500, NULL, 'H02', 'P08', '2023-10-02'),
(2501, NULL, 'H02', 'P08', '2023-10-02'),
(2502, NULL, 'H02', 'P08', '2023-10-02'),
(2503, NULL, 'H02', 'P08', '2023-10-02'),
(2504, NULL, 'H02', 'P08', '2023-10-02'),
(2505, NULL, 'H02', 'P08', '2023-10-02'),
(2506, NULL, 'H02', 'P08', '2023-10-02'),
(2507, NULL, 'H02', 'P08', '2023-10-02'),
(2508, NULL, 'H02', 'P08', '2023-10-02'),
(2509, NULL, 'H02', 'P08', '2023-10-02'),
(2510, NULL, 'H02', 'P08', '2023-10-02'),
(2511, NULL, 'H02', 'P08', '2023-10-02'),
(2512, NULL, 'H02', 'P08', '2023-10-02'),
(2513, NULL, 'H02', 'P08', '2023-10-02'),
(2514, NULL, 'H02', 'P08', '2023-10-02'),
(2515, NULL, 'H02', 'P08', '2023-10-02'),
(2516, NULL, 'H02', 'P08', '2023-10-02'),
(2517, NULL, 'H02', 'P08', '2023-10-02'),
(2518, NULL, 'H02', 'P08', '2023-10-02'),
(2519, NULL, 'H02', 'P08', '2023-10-02'),
(2520, NULL, 'H02', 'P08', '2023-10-02'),
(2521, NULL, 'H02', 'P08', '2023-10-02'),
(2522, NULL, 'H02', 'P08', '2023-10-02'),
(2523, NULL, 'H02', 'P08', '2023-10-02'),
(2524, NULL, 'H02', 'P08', '2023-10-02'),
(2525, NULL, 'H02', 'P08', '2023-10-02'),
(2526, NULL, 'H02', 'P08', '2023-10-02'),
(2527, NULL, 'H02', 'P08', '2023-10-02'),
(2528, NULL, 'H02', 'P08', '2023-10-02'),
(2529, NULL, 'H02', 'P08', '2023-10-02'),
(2530, NULL, 'H02', 'P08', '2023-10-02'),
(2531, NULL, 'H02', 'P08', '2023-10-02'),
(2532, NULL, 'H02', 'P08', '2023-10-02'),
(2533, NULL, 'H02', 'P08', '2023-10-02'),
(2534, NULL, 'H02', 'P08', '2023-10-02'),
(7481, NULL, 'H02', 'P23', '2023-10-02'),
(7482, NULL, 'H02', 'P23', '2023-10-02'),
(7487, NULL, 'H02', 'P25', '2023-10-02'),
(7781, '', 'H02', 'P14', '2024-10-17'),
(7782, '', 'H02', 'P29', '2024-10-17'),
(7783, '', 'H02', 'P26', '2024-10-17'),
(7784, '', 'H02', 'P01', '2024-10-17'),
(7785, '', 'H02', 'P02', '2024-10-17'),
(7786, '', 'H02', 'P03', '2024-10-17'),
(7787, '', 'H02', 'P18', '2024-10-17'),
(7788, '', 'H02', 'P04', '2024-10-17'),
(7789, '', 'H02', 'P05', '2024-10-17'),
(7790, '', 'H02', 'P10', '2024-10-17'),
(7791, '', 'H02', 'P09', '2024-10-17'),
(7792, '', 'H02', 'P07', '2024-10-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_statistik_diagnosis`
--

CREATE TABLE `tbl_statistik_diagnosis` (
  `id` int(11) NOT NULL,
  `kode_penyakit` varchar(11) NOT NULL,
  `tanggal_diagnosis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `username`, `password`) VALUES
(1, 'marwah', 'admin', 'admin123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_gejala`
--
ALTER TABLE `tbl_gejala`
  ADD PRIMARY KEY (`kode_gejala`);

--
-- Indexes for table `tbl_jenis_hewan`
--
ALTER TABLE `tbl_jenis_hewan`
  ADD PRIMARY KEY (`kode_hewan`),
  ADD UNIQUE KEY `kode_hewan` (`kode_hewan`),
  ADD KEY `kode_hewan_2` (`kode_hewan`);

--
-- Indexes for table `tbl_jenis_penyakit`
--
ALTER TABLE `tbl_jenis_penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indexes for table `tbl_penyakit`
--
ALTER TABLE `tbl_penyakit`
  ADD PRIMARY KEY (`kode_penyakit`);

--
-- Indexes for table `tbl_relasi`
--
ALTER TABLE `tbl_relasi`
  ADD KEY `id_penyakit` (`kode_penyakit`),
  ADD KEY `id_gejala` (`kode_gejala`);

--
-- Indexes for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_hewan` (`kode_hewan`,`kode_penyakit`),
  ADD KEY `tbl_riwayat_ibfk_2` (`kode_penyakit`);

--
-- Indexes for table `tbl_statistik_diagnosis`
--
ALTER TABLE `tbl_statistik_diagnosis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_penyakit` (`kode_penyakit`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7793;

--
-- AUTO_INCREMENT for table `tbl_statistik_diagnosis`
--
ALTER TABLE `tbl_statistik_diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_relasi`
--
ALTER TABLE `tbl_relasi`
  ADD CONSTRAINT `tbl_relasi_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `tbl_penyakit` (`kode_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_relasi_ibfk_2` FOREIGN KEY (`kode_gejala`) REFERENCES `tbl_gejala` (`kode_gejala`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_riwayat`
--
ALTER TABLE `tbl_riwayat`
  ADD CONSTRAINT `tbl_riwayat_ibfk_1` FOREIGN KEY (`kode_hewan`) REFERENCES `tbl_jenis_hewan` (`kode_hewan`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_riwayat_ibfk_2` FOREIGN KEY (`kode_penyakit`) REFERENCES `tbl_jenis_penyakit` (`kode_penyakit`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_statistik_diagnosis`
--
ALTER TABLE `tbl_statistik_diagnosis`
  ADD CONSTRAINT `tbl_statistik_diagnosis_ibfk_1` FOREIGN KEY (`kode_penyakit`) REFERENCES `tbl_penyakit` (`kode_penyakit`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
