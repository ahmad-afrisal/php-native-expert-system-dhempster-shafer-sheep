<?php
  // session_start();
  include '../components/header.php';
?>

  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <?php
        include '../components/sidebar.php';
      ?>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <?php
              include '../components/logo-header.php';
            ?>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <?php
            include '../components/navbar.php';
          ?>
          <!-- End Navbar -->
        </div>

        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Penyakit</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Edit</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <?php
                  $kode_penyakit = $_GET['kode_penyakit'];                
                  $query = mysqli_query($koneksi, "SELECT * FROM tbl_jenis_penyakit  WHERE kode_penyakit='$kode_penyakit'");
                  while ($data = mysqli_fetch_array($query)) {
                ?>
                <form method="POST" action="update.php">
                  <div class="card">
                    <div class="card-header">
                      <div class="card-title">Form Edit</div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <label for="kode_penyakit">Kode Penyakit</label>
                            <input
                              type="text"
                              value="<?= $data['kode_penyakit']; ?>"
                              class="form-control"
                              id="kode_penyakit"
                              name=""
                              placeholder="Masukkan Kode Penyakit"
                              disabled
                            />
                            <input type="hidden" name="kode_penyakit"  value="<?= $data['kode_penyakit']; ?>">
                          </div>
                          <div class="form-group">
                            <label for="nama_penyakit">Nama Penyakit</label>
                            <input
                              type="text"
                              value="<?= $data['nama_penyakit']; ?>"
                              class="form-control"
                              id="nama_penyakit"
                              name="nama_penyakit"
                              placeholder="Masukkan Nama Penyakit"
                              required
                            />
                          </div>
                      </div>
                    </div>
                    <div class="card-action">
                      <button type="submit" class="btn btn-success">Simpan</button>
                      <a href="index.php" class="btn btn-danger">Kembali</a>
                    </div>
                  </div>
                </form>
                <?php
                  }
                ?>
              </div>
            </div>
          </div>
        </div>

        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="http://www.themekita.com">
                    ThemeKita
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Help </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Licenses </a>
                </li>
              </ul>
            </nav>
            <div class="copyright">
              2024, made with <i class="fa fa-heart heart text-danger"></i> by
              <a href="http://www.themekita.com">ThemeKita</a>
            </div>
            <div>
              Distributed by
              <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
            </div>
          </div>
        </footer>
      </div>


    </div>
    <!--   Core JS Files   -->
    <script src="../../assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="../../assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- <script src="https://cdn.tiny.cloud/1/76vv5yc915yv41487s5xwbqpzas2kbhui8gd6fyk5ptjpezx/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script> -->
   
    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Kaiadmin JS -->
    <script src="../../assets/js/kaiadmin.min.js"></script>
    <script src="../../assets/js/froala_editor.pkgd.min.js"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="../../assets/js/setting-demo2.js"></script>

    <?php
      if (isset($_SESSION['flash_message'])) {
          $message = $_SESSION['flash_message'];
          echo "<script>
              Swal.fire({
                  icon: 'warning',
                  title: 'Gagal Validasi',
                  text: '$message'
              });
          </script>";
          unset($_SESSION['flash_message']);
      } 
    ?>
    <script>
      var editor = new FroalaEditor('#pencegahan');
      

      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        // $("#addRowButton").click(function () {
        //   $("#add-row")
        //     .dataTable()
        //     .fnAddData([
        //       $("#kode_kriteria").val(),
        //       $("#nama_kriteria").val(),
        //       $("#attribut").val(),
        //       $("#nilai_kriteria").val(),
        //       action,
        //     ]);
        //   $("#addRowModal").modal("hide");
        // });
      });
    </script>
  </body>
</html>
