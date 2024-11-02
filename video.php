<!DOCTYPE html>
<html lang="en">
  <?php
    include 'frontend/components/header.php';
  ?>

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

        <!-- Page Header Start -->
    <!-- <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Album Foto</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Galeri</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Album Foto</li>
                </ol>
            </nav>
        </div>
    </div> -->
    <!-- Page Header End -->


    <!-- Product Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Video Kegiatan</p>
                <h1 class="mb-5">Lebih dari Sekedar Momen</h1>
            </div>
            <div class="row gx-4">
                <?php
                    include 'includes/koneksi.php';

                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_galeri_video");
                    while($data = mysqli_fetch_array($query)) {
                ?>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="product-item">
                            <div class="position-relative">
                                <img class="img-fluid" src="frontend/img/video/<?= $data['cover']; ?>" alt="">
                                <div class="product-overlay">
                                    <a class="btn btn-square btn-secondary rounded-circle m-1" href="<?= $data['link']; ?>"><i class="bi bi-link"></i></a>
                                    <!-- <a class="btn btn-square btn-secondary rounded-circle m-1" href=""><i class="bi bi-cart"></i></a> -->
                                </div>
                            </div>
                            <div class="text-center p-4">
                                <a class="d-block h5" href="<?= $data['link']; ?>"><?= $data['judul_video']; ?></a>
                                <!-- <span class="text-primary me-1">$19.00</span>
                                <span class="text-decoration-line-through">$29.00</span> -->
                            </div>
                        </div>
                    </div>
                <?php
                    }
                ?>

            </div>
        </div>
    </div>
    <!-- Product End -->

    <!-- end content -->

    <?php
      include 'frontend/components/footer.php';
    ?>
  </body>
</html>

