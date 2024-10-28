<?php
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
            <div class="logo-header" data-background-color="dark">
              <a href="#" class="logo">
                <img
                  src="../assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
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
                  <a href="#">Berita</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Tambah</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <form method="POST" action="simpan.php" enctype="multipart/form-data">
                  <div class="card">
                    <div class="card-header">
                      <div class="card-title">Form Tambah</div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <label for="judul_berita">Judul Berita</label>
                            <input
                              type="text"
                              class="form-control"
                              id="judul_berita"
                              name="judul_berita"
                              placeholder="Masukkan Judul Berita"
                              required
                            />
                          </div>
                          <div class="form-group">
                            <label for="penulis">Penulis</label>
                            <input
                              type="text"
                              class="form-control"
                              id="penulis"
                              name="penulis"
                              placeholder="Masukkan Nama Penulis"
                              required
                            />
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlFile1"
                              >Gambar</label>
                              <br>
                            <input
                              type="file"
                              class="form-control-file"
                              name="foto"
                              required
                              id="exampleFormControlFile1"
                            />
                          </div>
                          <div class="form-group">
                            <label for="">Isi</label>
                            <textarea class="form-control" id="isi" name="isi"  rows="20" required></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect1"
                              >Pilih Status</label
                            >
                            <select
                              class="form-select form-control"
                              id="exampleFormControlSelect1"
                              name="status"
                            >
                              <option value="aktif">Aktif</option>
                              <option value="tidak aktif">Tidak Aktif</option>
                            </select>
                          </div>


                        </div>
                      </div>
                    </div>
                    <div class="card-action">
                      <button type="submit" class="btn btn-success">Simpan</button>
                      <a href="index.php" class="btn btn-danger">Kembali</a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <?php
          include '../components/footer.php';
        ?>
      </div>


    </div>
    <!--   Core JS Files   -->
    <script src="../../assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>

    <!-- Sweet Alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- jQuery Scrollbar -->
    <script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="../../assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- <script src="https://cdn.tiny.cloud/1/76vv5yc915yv41487s5xwbqpzas2kbhui8gd6fyk5ptjpezx/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
      var editor = new FroalaEditor('#isi');
      

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

        $('.js-example-basic-multiple').select2({
                    // theme: 'bootstrap5',
                    placeholder: "Please Select"
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
