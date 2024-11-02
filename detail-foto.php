<!DOCTYPE html>
<html lang="en">

 <?php
 
    include 'frontend/components/header.php'
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

    <?php
    include 'includes/koneksi.php';

    $id_galeri_foto = $_GET['id_galeri_foto'];
    $judulFoto = '';
    $queryJudulFoto = mysqli_query($koneksi, "SELECT * FROM tbl_galeri_foto WHERE id = $id_galeri_foto" );
    while($dataFoto = mysqli_fetch_array($queryJudulFoto)) {
        $judulFoto = $dataFoto['judul_foto']; 
    }
    ?>

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="section-title bg-white text-center text-primary px-3">Album Foto</p>
                <h1 class="mb-5"><?= $judulFoto; ?></h1>
            </div>
            <div class="row g-4">
                <?php
                  
                    $query = mysqli_query($koneksi, "SELECT * FROM tbl_galeri_foto_detail WHERE id_galeri_foto = $id_galeri_foto" );
                    while($data = mysqli_fetch_array($query)) {
                ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded p-4">
                        <img class="img-fluid rounded mb-4" src="frontend/img/foto/<?= $data['foto']; ?>" alt="">
                    </div>
                </div>
                <?php
                    }
                ?>

            </div>
        </div>
    </div>
    <!-- Team End -->


    <?php
        include 'frontend/components/footer.php'
    ?>
</body>

</html>