<?php
session_start();
include 'includes/koneksi.php';


if (isset($_POST["submit"])) {
  # code...
  $username = $_POST["username"];
  $password = $_POST["password"];


  $result = mysqli_query($koneksi,"SELECT * FROM tbl_user WHERE username = '$username'");

  if (mysqli_num_rows($result) === 1) {
    # code...
    $row = mysqli_fetch_assoc($result);
    if ($password === $row["password"]) {

      $_SESSION["login"] = true;
      $_SESSION["username"] = $row["username"];

      header("Location: backend/hitung/");
      exit;
    }
    
  }
  $error = true;
  
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
        <link href="frontend/img/logo_puskeswan.jpg" rel="icon" />


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
    <?php
      include 'frontend/components/spinner.php';
    ?>
    <!-- Spinner End -->

    <!-- Topbar Start -->
     <?php
      include 'frontend/components/topbar.php';
    ?>
    <!-- Topbar End -->

    <!-- Navbar Start -->
    <?php
      include 'frontend/components/navbar.php';
    ?>
    <!-- Navbar End -->

     <!-- Features Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title bg-white text-start text-primary pe-3">Layanan</p>
                    <h1 class="mb-4">Sistem Deteksi Penyakit Pada Kambing</h1>
                    <p class="mb-2">Pilih Gejala (Minimal 5 gejala):</p>
                    
                    <form method="post" action="layanan-hasil.php">
                      <div class="row">
                        <?php
                          // Mengambil data dari Tabel Penyakit
                          $query = mysqli_query($koneksi, "SELECT tbl_gejala.kode_gejala, tbl_gejala.nama_gejala FROM tbl_gejala JOIN tbl_relasi ON tbl_gejala.kode_gejala = tbl_relasi.kode_gejala GROUP BY tbl_gejala.kode_gejala;");

                          $no = 1;
                          while($data = mysqli_fetch_array($query)) {
                        ?>
                          <div class="col-6">
                            <p><input type="checkbox" style="width:20px;height:20px" class="form-check-input me-2" value="<?= $data['kode_gejala']; ?>" name="gejala[]" id=""><?= $data['kode_gejala']; ?> - <?= $data['nama_gejala']; ?></p>
                          </div>
                      <?php 
                        }
                      ?>
                      </div>
                      
                      <button type="submit" class="btn btn-secondary rounded-pill py-3 px-5 mt-3" >Diagnosis >></button>
                    </form>
                    </div>
            </div>
        </div>
    </div>
    <!-- Features End -->


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
