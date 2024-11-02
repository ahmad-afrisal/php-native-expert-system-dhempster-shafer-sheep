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


     <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Dokter</p>
                <h1 class="mb-5">Merawat setiap makhluk dengan kasih sayang</h1>
            </div>
            <div class="row g-4">
                <?php
                    include 'includes/koneksi.php';

                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_dokter");
                    while($data = mysqli_fetch_array($query)) {
                ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded p-4">
                        <img class="img-fluid rounded mb-4" src="frontend/img/doctors/<?= $data['foto']; ?>" alt="">
                        <h5><?= $data['nama_dokter']; ?></h5>
                        <p class="text-primary"><?= $data['bidang']; ?></p>
                        <!-- <div class="d-flex justify-content-center">
                            <a class="btn btn-square btn-outline-secondary rounded-circle mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-outline-secondary rounded-circle mx-1" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-outline-secondary rounded-circle mx-1" href=""><i class="fab fa-instagram"></i></a>
                        </div> -->
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Team End -->



    <!-- end content -->

    <?php
      include 'frontend/components/footer.php';
    ?>
  </body>
</html>

