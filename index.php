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
    <link
      href="frontend/lib/owlcarousel/assets/owl.carousel.min.css"
      rel="stylesheet"
    />
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
          <a href="layanan.php" class="nav-item nav-link">Layanan</a>
        </div>
        <div class="border-start ps-4 d-none d-lg-block">
          <a href="login.php" class="nav-item nav-link">Login</a>
          <!-- <button type="button" class="btn btn-sm p-0">login</button> -->
        </div>
      </div>
    </nav>
    <!-- Navbar End -->

    <!-- Carousel Start -->
    <div class="container-fluid px-0 mb-5">
      <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="w-100" src="frontend/img/carousel-3.jpg" alt="Image" />
            <div class="carousel-caption">
              <div class="container">
                <div class="row justify-content-start">
                  <div class="col-lg-8 text-start">
                    <p class="fs-4 text-white">Pusat Kesehatan Hewan Banggae</p>
                    <h1 class="display-1 text-white mb-5 animated slideInRight">
                      Kesehatan Optimal untuk Hewan
                    </h1>
                    <!-- <a
                      href=""
                      class="btn btn-secondary rounded-pill py-3 px-5 animated slideInRight"
                      >Explore More</a
                    > -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="w-100" src="frontend/img/carousel-4.jpg" alt="Image" />
            <div class="carousel-caption">
              <div class="container">
                <div class="row justify-content-end">
                  <div class="col-lg-8 text-end">
                    <p class="fs-4 text-white">Perawatan Hewan Terbaik</p>
                    <h1 class="display-1 text-white mb-5 animated slideInRight">
                      Layanan Kesehatan Berkualitas
                    </h1>
                    <!-- <a
                      href=""
                      class="btn btn-secondary rounded-pill py-3 px-5 animated slideInLeft"
                      >Explore More</a
                    > -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#header-carousel"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#header-carousel"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!-- Carousel End -->

     <!-- Gallery Start -->
    <div class="container-xxl py-5 px-0">
        <div class="row g-0">
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-0">
                    <div class="col-12">
                        <a class="d-block" href="img/gallery-5.jpg" data-lightbox="gallery">
                            <img class="img-fluid" src="img/gallery-5.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-12">
                        <a class="d-block" href="img/gallery-1.jpg" data-lightbox="gallery">
                            <img class="img-fluid" src="img/gallery-1.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="row g-0">
                    <div class="col-12">
                        <a class="d-block" href="img/gallery-2.jpg" data-lightbox="gallery">
                            <img class="img-fluid" src="img/gallery-2.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-12">
                        <a class="d-block" href="img/gallery-6.jpg" data-lightbox="gallery">
                            <img class="img-fluid" src="img/gallery-6.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="row g-0">
                    <div class="col-12">
                        <a class="d-block" href="img/gallery-7.jpg" data-lightbox="gallery">
                            <img class="img-fluid" src="img/gallery-7.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-12">
                        <a class="d-block" href="img/gallery-3.jpg" data-lightbox="gallery">
                            <img class="img-fluid" src="img/gallery-3.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="row g-0">
                    <div class="col-12">
                        <a class="d-block" href="img/gallery-4.jpg" data-lightbox="gallery">
                            <img class="img-fluid" src="img/gallery-4.jpg" alt="">
                        </a>
                    </div>
                    <div class="col-12">
                        <a class="d-block" href="img/gallery-8.jpg" data-lightbox="gallery">
                            <img class="img-fluid" src="img/gallery-8.jpg" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery End -->

    <!-- Contact Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div
          class="text-center mx-auto wow fadeInUp"
          data-wow-delay="0.1s"
          style="max-width: 500px"
        >
          <p class="section-title bg-white text-center text-primary px-3">
            Kontak Kami
          </p>
          <h1 class="mb-5">Jika butuh bantuan, Segera Hubungi Kami</h1>
        </div>
        <div class="row g-5">
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
            <h3 class="mb-4">Kontak Detail</h3>
            <div class="d-flex border-bottom pb-3 mb-3">
              <div class="flex-shrink-0 btn-square bg-secondary rounded-circle">
                <i class="fa fa-map-marker-alt text-body"></i>
              </div>
              <div class="ms-3">
                <h6>Alamat Kantor</h6>
                <span
                  >Jalan Lagama, Lingkungan Moloku, Totoli, Kec. Banggae,
                  Majene</span
                >
              </div>
            </div>
            <div class="d-flex border-bottom pb-3 mb-3">
              <div class="flex-shrink-0 btn-square bg-secondary rounded-circle">
                <i class="fa fa-phone-alt text-body"></i>
              </div>
              <div class="ms-3">
                <h6>Whatsapp</h6>
                <span>+62 852-4280-9779</span>
              </div>
            </div>

            <iframe
              class="w-100 rounded"
              src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15928.716318689916!2d118.945814!3d-3.5461368!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d94b9daa2b28b7d%3A0xf76ccf44277e05f2!2sPUSKESWAN%20BANGGAE!5e0!3m2!1sen!2sid!4v1726796722550!5m2!1sen!2sid"
              frameborder="0"
              style="min-height: 300px; border: 0"
              allowfullscreen=""
              aria-hidden="false"
              tabindex="0"
            ></iframe>
          </div>
          <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
            <h3 class="mb-4">Jam Kerja</h3>
            <div class="d-flex border-bottom pb-3 mb-3">
              <div class="flex-shrink-0 btn-square bg-secondary rounded-circle">
                <i class="fa fa-map-marker-alt text-body"></i>
              </div>
              <div class="ms-3">
                <h6>Senin - Jumat</h6>
                <span>09:00 - 17:00</span>
              </div>
            </div>
            <div class="d-flex border-bottom pb-3 mb-3">
              <div class="flex-shrink-0 btn-square bg-secondary rounded-circle">
                <i class="fa fa-phone-alt text-body"></i>
              </div>
              <div class="ms-3">
                <h6>Sabtu - Minggu</h6>
                <span>Tutup</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Contact End -->

    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
      <div class="container">
        <div
          class="text-center mx-auto wow fadeInUp"
          data-wow-delay="0.1s"
          style="max-width: 500px"
        >
          <p class="section-title bg-white text-center text-primary px-3">
            Testimonial
          </p>
          <h1 class="mb-5">Apa yang mereka katakan tentang kami</h1>
        </div>
        <div class="row g-5 align-items-center">
          <div class="col-lg-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="testimonial-img">
              <img
                class="img-fluid animated pulse infinite"
                src="frontend/img/testimonial-1.jpg"
                alt=""
              />
              <img
                class="img-fluid animated pulse infinite"
                src="frontend/img/testimonial-2.jpg"
                alt=""
              />
              <img
                class="img-fluid animated pulse infinite"
                src="frontend/img/testimonial-3.jpg"
                alt=""
              />
              <img
                class="img-fluid animated pulse infinite"
                src="frontend/img/testimonial-4.jpg"
                alt=""
              />
            </div>
          </div>
          <div class="col-lg-7 wow fadeInUp" data-wow-delay="0.5s">
            <div class="owl-carousel testimonial-carousel">
              <div class="testimonial-item">
                <img
                  class="img-fluid mb-3"
                  src="frontend/img/testimonial-5.png"
                  alt=""
                />
                <p class="fs-5">
                  Mudah aksesnya,ramah petugasnya,siaga pelayanannya.
                </p>
                <h5>La Ode Fitriadi Idrus</h5>
                <span class="text-primary">Peternak</span>
              </div>
              <div class="testimonial-item">
                <img
                  class="img-fluid mb-3"
                  src="frontend/img/testimonial-6.png"
                  alt=""
                />
                <p class="fs-5">Bagus</p>
                <h5>Hery D Inkasaria</h5>
                <span class="text-primary">Peternak</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Testimonial End -->

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
