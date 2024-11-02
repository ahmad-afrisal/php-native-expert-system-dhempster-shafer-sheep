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


    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Album Foto</p>
                <h1 class="mb-5">Mengabadikan Momen, Menyatukan Cerita</h1>
            </div>
            <div class="row gy-5 gx-4">
              <?php
                include 'includes/koneksi.php';

                $sql = "SELECT tbl_galeri_foto.id as id_foto, judul_foto, tbl_galeri_foto_detail.id, foto, id_galeri_foto FROM tbl_galeri_foto JOIN tbl_galeri_foto_detail ON tbl_galeri_foto.id = tbl_galeri_foto_detail.id_galeri_foto 
                AND tbl_galeri_foto_detail.id = (
                SELECT MIN(id)
                FROM tbl_galeri_foto_detail
                WHERE tbl_galeri_foto_detail.id_galeri_foto = tbl_galeri_foto.id)
                ";
                $query = mysqli_query($koneksi, $sql);
                // echo($query);
                while($data = mysqli_fetch_array($query)) {
                
              ?>
                <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item d-flex h-100">
                        <div class="service-img">
                            <img class="img-fluid" src="frontend/img/foto/<?= $data['foto']; ?>" alt="">
                        </div>
                        <div class="service-text p-5 pt-0">
                            <div class="service-icon">
                                <img style="width: 100%; height: 100%; object-fit: cover; " src="frontend/img/foto/<?= $data['foto']; ?>" alt="">
                            </div>
                            <h5 class="mb-3"><?= $data['judul_foto']; ?></h4>
                            <!-- <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p> -->
                            <a class="btn btn-square rounded-circle" href="detail-foto.php?id_galeri_foto=<?= $data['id_foto']; ?>"><i class="bi bi-chevron-double-right"></i></a>
                        </div>
                    </div>
                </div>
              <?php
                }
              ?>
            </div>
        </div>
    </div>
    <!-- Service End -->

    <!-- end content -->

    <?php
      include 'frontend/components/footer.php';
    ?>
  </body>
</html>

