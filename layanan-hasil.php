<?php
  include 'includes/koneksi.php';

  // TANGKAP GEJALA YANG DIKIRIM USER
  $gejalaTest = [];

  
  // Cek apakah ada data checkbox yang dikirimkan dan lebihatau sama denga 5
  if (isset($_POST['gejala']) && is_array($_POST['gejala'])) {
      $gejala = $_POST['gejala'];

    if(count($gejala) >= 5) {
      for($i = 0; $i < count($gejala); $i++) {
        $gejalaTest[$i] = $gejala[$i];
      }
    } else {
        header("location:layanan.php?alert=Minimal Gejala yang dipilih 5");
        exit;
    } 
  } else {
      header("location:layanan.php?alert=Tidak ada gejala yang dipilih");
  }
  
  // Inisialisasi array asosiatif
  $gejala = [];

  // Mengambil data dari Tabel Gejala
  $query = mysqli_query($koneksi, "SELECT kode_gejala, nama_gejala FROM tbl_gejala");
  while($data = $query->fetch_assoc()) {
    $gejala[$data['kode_gejala']] = $data['nama_gejala'];
  }

  // Inisialisasi array asosiatif
  $penyakit = [];

  // Mengambil data dari Tabel Penyakit
  $query = mysqli_query($koneksi, "SELECT kode_penyakit, nama_penyakit FROM tbl_penyakit");
  while($data = mysqli_fetch_array($query)) {
    $penyakit[$data['kode_penyakit']] = $data['nama_penyakit'];
  }

  $relasi = [];

    // Mengambil data dari Tabel Gejala
  $query = mysqli_query($koneksi, "SELECT kode_penyakit, kode_gejala FROM tbl_relasi");
  // Memeriksa apakah ada hasil
  // Proses hasil query
  if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
          $kode_penyakit = $row['kode_penyakit'];
          $kode_gejala = $row['kode_gejala'];

          // Jika penyakit belum ada di array relasi, inisialisasi sebagai array kosong
          if (!isset($relasi[$kode_penyakit])) {
              $relasi[$kode_penyakit] = [];
          }

          // Tambahkan gejala ke array penyakit yang sesuai
          $relasi[$kode_penyakit][] = $kode_gejala;
      }
  } else {
      echo "Tidak ada data di tabel relasi.";
  }


  // Fungsi untuk mendapatkan nama gejala berdasarkan kode
  function getNamaGejala($kode, $gejala) {
      return isset($gejala[$kode]) ? $gejala[$kode] : "Kode gejala tidak ditemukan";
  }

  // Fungsi untuk mendapatkan nama gejala berdasarkan kode
  function getNamaPenyakit($kode, $penyakit) {
      return isset($penyakit[$kode]) ? $penyakit[$kode] : "Kode penyakit tidak ditemukan";
  }

  $nilaiGejala = [];

  // Mencetak data
  foreach ($penyakit as $index => $penyakit_id) {
  // Pastikan $index ada dalam array $relasi
      if (isset($relasi[$index])) {
        // Hitung nilai untuk setiap gejala
      $value = 1.0 / count($relasi[$index]);
      // Array untuk menyimpan nilai gejala
      $nilaiGejala[$index] = [];
        foreach ($relasi[$index] as $kodeGejala) {
          $nilaiGejala[$index][$kodeGejala] = $value;
          
        }
      }
  }

    
  $fungsi_densitas = [];

  // Melakukan iterasi pada setiap penyakit dan gejala terkaitnya
  foreach ($relasi as $penyakit_kode => $gejalas) {
      foreach ($gejalas as $g) {
          // Menambahkan penyakit ke dalam daftar penyakit untuk gejala tertentu
          if (!isset($fungsi_densitas[$g])) {
              $fungsi_densitas[$g] = [];
          }
          $fungsi_densitas[$g][] = $penyakit_kode;
      }
  }

  // $beliefs = [];
  // Menghitung nilai belief dan plausibility untuk setiap gejala
  $beliefs = [];
  $plausibility = [];
    foreach ($fungsi_densitas as $gj => $penyakitall) {
      $nilai_gejala_total = [];
      
      // Mengumpulkan nilai gejala untuk penyakit yang terkait
      foreach ($penyakitall as $p) {
          if (isset($nilaiGejala[$p][$gj])) {
              $nilai_gejala_total[] = $nilaiGejala[$p][$gj];
          }
      }

      // var_dump($nilai_gejala_total);
      
      // Hitung rata-rata belief untuk gejala
      if (!empty($nilai_gejala_total)) {
          $average_belief = array_sum($nilai_gejala_total) / count($nilai_gejala_total);
          $beliefs[$gj] = $average_belief;
          $plausibility[$gj] = 1 - $average_belief;
      } else {
          $beliefs[$gj] = 0;
          $plausibility[$gj] = 1;
      }
    }
  
            // Pengecekana apakah ada gejala yang terpilih
    
      $indexGejala1 = $gejalaTest[0];


      // Mengambil Simbol Gej 1
      $m1Symbols = [$fungsi_densitas[$indexGejala1], [-1]];
      // Mengambil Nilai Bel & Plau Gej 1
      $m1Values = [$plausibility[$indexGejala1], $beliefs[$indexGejala1]];

      // Validasi Jika Pilihan Gejala Lebih dari 1
      if (count($gejalaTest) > 1) {
        // Buat For Sebanyak Gejala
          for ($i = 1; $i < count($gejalaTest); $i++) {
            // Ambil Gejala 2
              $indexGejala2 = $gejalaTest[$i];
                // Mengambil Simbol Gej 2
              $m2Symbols = [$fungsi_densitas[$indexGejala2], [-1]];
              // Mengambil Nilai Bel & Plau Gej 2
              $m2Values = [$plausibility[$indexGejala2], $beliefs[$indexGejala2]];
  
              $matrixSymbols = array_fill(0, count($m1Values), array_fill(0, count($m2Values), null));
              $matrixValues = array_fill(0, count($m1Values), array_fill(0, count($m2Values), 0));

              $sumNULL = 0;
  
              for ($j = 0; $j < count($matrixValues); $j++) {
                  for ($k = 0; $k < count($matrixValues[$j]); $k++) {
                      $matrixValues[$j][$k] = $m1Values[$j] * $m2Values[$k];
                      $symbol1 = $m1Symbols[$j];
                      $symbol2 = $m2Symbols[$k];
  
                      if ($j < count($matrixValues) - 1) {
                          if ($k < count($matrixValues[$j]) - 1) {
                              $isSubset = true;
                              foreach ($symbol1 as $s1) {
                                  if (!in_array($s1, $symbol2)) {
                                      $isSubset = false;
                                      break;
                                  }
                              }
                              $matrixSymbols[$j][$k] = $isSubset ? $symbol1 : null;
                          } else {
                              $matrixSymbols[$j][$k] = $symbol1;
                          }
                      } else {
                          $matrixSymbols[$j][$k] = ($k < count($matrixValues[$j]) - 1) ? $symbol2 : [-1];
                      }
  
                      if ($matrixSymbols[$j][$k] === null) {
                          $sumNULL += $matrixValues[$j][$k];
                      }
                  }
              }
  
              $newSymbols = array_fill(0, count($m1Symbols) + 1, []);
              $newValues = array_fill(0, count($m1Values) + 1, 0);
              $denominator = 1 - $sumNULL;
  
              for ($j = 0; $j < count($m1Symbols) - 1; $j++) {
                  $newSymbols[$j] = $m1Symbols[$j];
                  $numerator = $matrixValues[$j][1];
                  $newValues[$j] = $numerator / $denominator;
              }
  
              $newSymbols[count($m1Symbols) - 1] = $m2Symbols[0];
              $numerator = $matrixValues[count($matrixValues) - 1][0];
              $newValues[count($m1Symbols) - 1] = $numerator / $denominator;
  
              $newSymbols[count($newSymbols) - 1] = [-1];
              $numerator = $matrixValues[count($matrixValues) - 1][count($matrixValues[0]) - 1];
              $newValues[count($newValues) - 1] = $numerator / $denominator;
  
              $m1Symbols = $newSymbols;
              $m1Values = $newValues;
          }
  
          $penyakitTerdeteksi = [];
          for ($i = 0; $i < count($m1Symbols); $i++) {
              foreach ($m1Symbols[$i] as $symbol) {
                  if ($symbol !== -1 && !in_array($symbol, $penyakitTerdeteksi)) {
                      $penyakitTerdeteksi[] = $symbol;
                  }
              }
          }
  
          $iMAX = -1;
          $MAX_DENSITY = PHP_FLOAT_MIN;
          $densitasPenyakit = array_fill(0, count($penyakitTerdeteksi), 0);
          for ($i = 0; $i < count($penyakitTerdeteksi); $i++) {
              $value = 0;
              $p = $penyakitTerdeteksi[$i];
              for ($j = 0; $j < count($m1Symbols); $j++) {
                  if (in_array($p, $m1Symbols[$j])) {
                      $value += $m1Values[$j];
                  }
              }
              $densitasPenyakit[$i] = $value;
              if ($densitasPenyakit[$i] > $MAX_DENSITY) {
                  $MAX_DENSITY = $densitasPenyakit[$i];
                  $iMAX = $i;
              }
      }

      $fungsi_densitas = []; 

      // Looping melalui setiap penyakit
      foreach ($relasi as $pen => $daftarGejala) {
          // Looping melalui gejala yang terkait dengan penyakit tersebut
          foreach ($daftarGejala as $geja) {
              // Menambahkan penyakit ke dalam daftar fungsi densitas untuk gejala terkait
              $fungsi_densitas[$geja][] = $pen;
          }
      }


      // Inisialisasi belief dan plausibility untuk setiap gejala
      $belief = [];
      $plausibility = [];

      // Hitung Belief dan Plausibility untuk setiap gejala
      foreach ($fungsi_densitas as $gejala => $penyakitTerkait) {
          $b = 0;
          $n = count($penyakitTerkait); // Jumlah penyakit yang terkait dengan gejala ini
          
          // Loop melalui setiap penyakit yang terkait dengan gejala
          foreach ($penyakitTerkait as $pen) {
              // Cek apakah gejala ada dalam penyakit yang terkait
              if (isset($nilai_gejala[$pen][$gejala])) {
                  // Tambahkan nilai gejala ke variabel $b
                  $b += $nilai_gejala[$pen][$gejala];
              }
          }
          
          // Menghitung belief sebagai rata-rata nilai gejala terkait
          $belief[$gejala] = ($n > 0) ? $b / $n : 0;
          
          // Menghitung plausibility (1 - belief)
          $plausibility[$gejala] = 1 - $belief[$gejala];
      }

      $indexPenyakitDiagnosa = $penyakitTerdeteksi[$iMAX]; // Mendapatkan key penyakit dengan densitas maksimum
            // var_dump($penyakit);
      $penyakitDiagnosa = $penyakit[$indexPenyakitDiagnosa];
      
      $kode_penyakit = "";
      $keterangan = "";
      $pencegahan = "";
      $query = mysqli_query($koneksi, "SELECT * FROM tbl_penyakit WHERE nama_penyakit='$penyakitDiagnosa'");
      while($data = mysqli_fetch_array($query)) {
        $kode_penyakit = $data['kode_penyakit'];
        $keterangan = $data['keterangan'];
        $pencegahan = $data['pencegahan'];
      }

      $dateNow = date("Y-m-d");

      $id = null;

      // Query Insert Ke tbl statistik diagnosis
      $sql_penyakit = "INSERT INTO tbl_statistik_diagnosis (id, kode_penyakit, tanggal_diagnosis) VALUES (?, ?, ?)";
      $stmt_penyakit = $koneksi->prepare($sql_penyakit);
      $stmt_penyakit->bind_param("iss", $id, $kode_penyakit, $dateNow);
      $stmt_penyakit->execute();

    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Puskeswan Banggae</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="frontend/img/goat.png" rel="icon" />


    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&family=Open+Sans:wght@400;500;600&display=swap"
      rel="stylesheet"
    />

    <!-- Icon Font Stylesheet -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

    <!-- Libraries Stylesheet -->
    <link href="frontend/lib/animate/animate.min.css" rel="stylesheet" />
    <link href="frontend/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="frontend/lib/lightbox/css/lightbox.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="frontend/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="frontend/css/style.css" rel="stylesheet" />
  </head>

  <body>
    <!-- Spinner Start -->
    <div
      id="spinner"
      class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center"
    >
      <div
        class="spinner-border text-primary"
        role="status"
        style="width: 3rem; height: 3rem"
      ></div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-0">
      <div class="row g-0 d-none d-lg-flex">
        <div class="col-lg-6 ps-5 text-start">
          <!-- <div class="h-100 d-inline-flex align-items-center text-light">
            <span>Follow Us:</span>
            <a class="btn btn-link text-light" href=""
              ><i class="fab fa-facebook-f"></i
            ></a>
            <a class="btn btn-link text-light" href=""
              ><i class="fab fa-twitter"></i
            ></a>
            <a class="btn btn-link text-light" href=""
              ><i class="fab fa-linkedin-in"></i
            ></a>
            <a class="btn btn-link text-light" href=""
              ><i class="fab fa-instagram"></i
            ></a>
          </div> -->
        </div>
        <div class="col-lg-6 text-end">
          <div
            class="h-100 bg-secondary d-inline-flex align-items-center text-dark py-2 px-4"
          >
          <a href="https://wa.me/6285242809779?text=Hallo%20Dokter,%20Saya%20ingin%20berkonsultasi?" target="_blank">
            <span class="me-2 fw-semi-bold"><i class="fa fa-phone-alt me-2"></i>Whatsapp:</span>
            <span>+62 852-4280-9779</span>
          </a>
          </div>
        </div>
      </div>
    </div>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <nav
      class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 mb-3" style="border-bottom: 2px solid #404A3D;"
    >
      <a href="index.php" class="navbar-brand d-flex align-items-center">
        <h3 class="m-0">Puskeswan Banggae</h3>
      </a>
      <button
        type="button"
        class="navbar-toggler me-0"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
          <a href="index.php" class="nav-item nav-link">Home</a>
          <a href="layanan.php" class="nav-item nav-link active">Layanan</a>
        </div>
        <div class="border-start ps-4 d-none d-lg-block">
          <a href="login.php" class="nav-item nav-link">Login</a>
          <!-- <button type="button" class="btn btn-sm p-0">login</button> -->
        </div>
      </div>
    </nav>
    <!-- Navbar End -->


 <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-12 wow fadeIn" data-wow-delay="0.5s">
                    <p class="section-title bg-white text-start text-primary pe-3">Diagnosis</p>
                    <p class="mb-4">Hasil Diagnosis : </p>
                    <h1 class="mb-4">"<?= $penyakitDiagnosa ?>"</h1>
                    <div class="row g-5 pt-2 mb-5">
                        <div class="col-sm-6">
                            <img class="img-fluid mb-4" src="img/service.png" alt="">
                            <h5 class="mb-3">Keterangan Penyakit : </h5>
                            <?= $keterangan ?>
                            <!-- <span>Clita erat ipsum et lorem et sit, sed stet lorem sit clita</span> -->
                        </div>
                        <div class="col-sm-6">
                            <img class="img-fluid mb-4" src="img/product.png" alt="">
                            <h5 class="mb-3">Cara Pengobatan : </h5>
                            <?= $pencegahan ?>
                            <!-- <span>Clita erat ipsum et lorem et sit, sed stet lorem sit clita</span> -->
                        </div>
                    </div>
                    <!-- <a class="btn btn-secondary rounded-pill py-3 px-5" href="">Explore More</a> -->
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Copyright Start -->
    <div class="container-fluid bg-secondary text-body copyright py-4">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
            &copy; <a class="fw-semi-bold" href="#">Puskeswan Banggae</a>, All
            Right Reserved.
          </div>
          <div class="col-md-6 text-center text-md-end">
            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
            <!-- Designed By -->
            <!-- <a class="fw-semi-bold" href="https://htmlcodex.com">HTML Codex</a> -->
          </div>
        </div>
      </div>
    </div>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a
      href="#"
      class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"
      ><i class="bi bi-arrow-up"></i
    ></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="frontend/lib/wow/wow.min.js"></script>
    <script src="frontend/lib/easing/easing.min.js"></script>
    <script src="frontend/lib/waypoints/waypoints.min.js"></script>
    <script src="frontend/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="frontend/lib/counterup/counterup.min.js"></script>
    <script src="frontend/lib/parallax/parallax.min.js"></script>
    <script src="frontend/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="frontend/js/main.js"></script>
  </body>
</html>
