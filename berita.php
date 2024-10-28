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

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">


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
            <li><a class="dropdown-item" href="berita.php">Video Kegiatan</a></li>
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

 <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <div class="carousel-item active">
          <img src="frontend/img/hero-carousel/hero-carousel-1.jpg" alt="">
          <div class="container">
            <h2>Welcome to Health Articles</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <a href="#" class="btn-get-started">Read More</a>
          </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
          <img src="frontend/img/hero-carousel/hero-carousel-2.jpg" alt="">
          <div class="container">
            <h2>At vero eos et accusamus</h2>
            <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut.</p>
            <a href="#about" class="btn-get-started">Read More</a>
          </div>
        </div><!-- End Carousel Item -->

        <div class="carousel-item">
          <img src="frontend/img/hero-carousel/hero-carousel-3.jpg" alt="">
          <div class="container">
            <h2>Temporibus autem quibusdam</h2>
            <p>Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt omnis iste natus error sit voluptatem accusantium.</p>
            <a href="#about" class="btn-get-started">Read More</a>
          </div>
        </div><!-- End Carousel Item -->

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="fas fa-heartbeat icon"></i></div>
              <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="fas fa-pills icon"></i></div>
              <h4><a href="" class="stretched-link">Sed ut perspici</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon"><i class="fas fa-thermometer icon"></i></div>
              <h4><a href="" class="stretched-link">Magni Dolores</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon"><i class="fas fa-dna icon"></i></div>
              <h4><a href="" class="stretched-link">Nemo Enim</a></h4>
              <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Featured Services Section -->

    </main>
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
