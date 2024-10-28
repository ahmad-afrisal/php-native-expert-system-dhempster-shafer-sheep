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
    <link
      href="frontend/lib/owlcarousel/assets/owl.carousel.min.css"
      rel="stylesheet"
    />
    <link href="frontend/lib/lightbox/css/lightbox.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="frontend/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="frontend/css/style.css" rel="stylesheet" />
    <link href="frontend/css/berita.css" rel="stylesheet">
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
      class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5"
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
          <a href="index.php" class="nav-item nav-link active">Home</a>
      <!-- profile -->
          <li class="nav-item dropdown">  
            <a href="#" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Profile
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="sejarah.php">Sejarah</a></li>
              <li><a class="dropdown-item" href="visi_misi.php">Visi Misi</a></li>
              <li><a class="dropdown-item" href="struktur_organisasi.php">Struktur Organisasi</a></li>
              <li><a class="dropdown-item" href="dokter.php">Dokter</a></li>
            </ul>
          </li> 
      <!-- end profile -->

      <!-- Berita -->
          <li class="nav-item dropdown">
          <a href="#" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Berita
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="berita.php">Artikel Kesehatan Hewan</a></li>
          </ul>
        </li>
      <!-- end Berita -->

      <!--informasi -->
        <li class="nav-item dropdown">  
            <a href="#" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Informasi
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="profil1.php">Jadwal Dokter</a></li>
              <li><a class="dropdown-item" href="profil2.php">Jadwal Pelayanan</a></li>
              <li><a class="dropdown-item" href="profil3.php">Manual Book</a></li>
              <li><a class="dropdown-item" href="profil4.php">Peraturan Yang Berlaku</a></li>
            </ul>
          </li> 
      <!-- end informasi -->

      <!-- Galeri -->
          <li class="nav-item dropdown">
          <a href="#" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Galeri
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="foto.php">Album Foto</a></li>
            <li><a class="dropdown-item" href="video.php">Video Kegiatan</a></li>
          </ul>
        </li>
      <!-- end Galeri -->
      
      <!-- fasilitas & layanan-->
      <li class="nav-item dropdown">
          <a href="#" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Layanan
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="fasilitas.php">Fasilitas</a></li>
            <li><a class="dropdown-item" href="form_layanan.php">Layanan</a></li>
          </ul>
        </li>
      <!-- end fasilitas & layanan -->
      <a href="layanan.php" class="nav-item nav-link">Data Statistik</a>
        </div>
        <div class="border-start ps-4 d-none d-lg-block">
          <a href="login.php" class="nav-item nav-link">Login</a>
          <!-- <button type="button" class="btn btn-sm p-0">login</button> -->
        </div>
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- start content -->
     <!-- Tabs Section -->
     <section id="tabs" class="tabs section">

<!-- Section Title -->
<div class="container section-title" data-aos="fade-up">
  <h2>Departments</h2>
  <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
</div><!-- End Section Title -->

<div class="container" data-aos="fade-up" data-aos-delay="100">

  <div class="row">
    <div class="col-lg-3">
      <ul class="nav nav-tabs flex-column">
        <li class="nav-item">
          <a class="nav-link active show" data-bs-toggle="tab" href="#tabs-tab-1">Cardiology</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#tabs-tab-2">Neurology</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#tabs-tab-3">Hepatology</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#tabs-tab-4">Pediatrics</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="tab" href="#tabs-tab-5">Ophthalmologists</a>
        </li>
      </ul>
    </div>
    <div class="col-lg-9 mt-4 mt-lg-0">
      <div class="tab-content">
        <div class="tab-pane active show" id="tabs-tab-1">
          <div class="row">
            <div class="col-lg-8 details order-2 order-lg-1">
              <h3>Cardiology</h3>
              <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
              <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
            </div>
            <div class="col-lg-4 text-center order-1 order-lg-2">
              <img src="frontend/img/gallery/departments-1.jpg" alt="" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="tab-pane" id="tabs-tab-2">
          <div class="row">
            <div class="col-lg-8 details order-2 order-lg-1">
              <h3>Neurology</h3>
              <p class="fst-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
              <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>
            </div>
            <div class="col-lg-4 text-center order-1 order-lg-2">
              <img src="frontend/img/gallery/departments-2.jpg" alt="" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="tab-pane" id="tabs-tab-3">
          <div class="row">
            <div class="col-lg-8 details order-2 order-lg-1">
              <h3>Hepatology</h3>
              <p class="fst-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
              <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>
            </div>
            <div class="col-lg-4 text-center order-1 order-lg-2">
              <img src="frontend/img/gallery/departments-3.jpg" alt="" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="tab-pane" id="tabs-tab-4">
          <div class="row">
            <div class="col-lg-8 details order-2 order-lg-1">
              <h3>Pediatrics</h3>
              <p class="fst-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
              <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
            </div>
            <div class="col-lg-4 text-center order-1 order-lg-2">
              <img src="frontend/img/gallery/departments-4.jpg" alt="" class="img-fluid">
            </div>
          </div>
        </div>
        <div class="tab-pane" id="tabs-tab-5">
          <div class="row">
            <div class="col-lg-8 details order-2 order-lg-1">
              <h3>Ophthalmologists</h3>
              <p class="fst-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
              <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
            </div>
            <div class="col-lg-4 text-center order-1 order-lg-2">
              <img src="frontend/img/gallery/departments-5.jpg" alt="" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

</section><!-- /Tabs Section -->

    <!-- end content -->

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
    <script src="frontend/jss/main.js"></script>
  </body>
</html>

