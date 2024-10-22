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
                  <a href="#">Riwayat</a>
                </li>
              </ul>
            </div>
            <div class="row">

              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Riwayat</h4>
                      <a
                        class="btn btn-primary btn-round ms-auto"
                        href="tambah.php"
                      >
                        <i class="fa fa-plus"></i>
                        Tambah
                      </a>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="add-row"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>NO</th>
                            <th>NAMA PETERNAK</th>
                            <th>JENIS HEWAN</th>
                            <th>PENYAKIT</th>
                            <th>WAKTU PEMERIKSAAN</th>
                            <th style="width: 10%">AKSI</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th>NO</th>
                            <th>NAMA PETERNAK</th>
                            <th>JENIS HEWAN</th>
                            <th>PENYAKIT</th>
                            <th>WAKTU PEMERIKSAAN</th>
                            <th>AKSI</th>
                          </tr>
                        </tfoot>
                        <tbody>
                        <?php
                          // Mengambil data dari Tabel Penyakit
                          $query = mysqli_query($koneksi, "SELECT * FROM tbl_riwayat JOIN tbl_jenis_hewan ON tbl_riwayat.kode_hewan=tbl_jenis_hewan.kode_hewan JOIN tbl_jenis_penyakit ON tbl_riwayat.kode_penyakit=tbl_jenis_penyakit.kode_penyakit ORDER BY id DESC");
                          $no = 1;
                          while($data = mysqli_fetch_array($query)) {

                        ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data["nama_peternak"]; ?></td>
                            <td><?= $data["nama_hewan"]; ?></td>
                            <td><?= $data["nama_penyakit"]; ?></td>
                            <td><?= $data["tgl_pemeriksaan"]; ?></td>
                            <td>
                              <div class="form-button-action">
                                <a
                                  href="edit.php?id=<?= $data['id']; ?>"
                                  class="btn btn-link btn-primary"
                                  data-original-title="Edit Task"
                                >
                                  <i class="fa fa-edit"></i>
                                </a>
                                <button type="button"
                                  data-id="<?= $data['id']; ?>"
                                  class="btn btn-link btn-danger delete-btn"
                                  data-original-title="Remove"
                                >
                                  <i class="fa fa-times"></i>
                                </button>
                              </div>
                            </td>
                          </tr>

                        <?php
                          }
                        ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
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
    <!-- Kaiadmin JS -->
    <script src="../../assets/js/kaiadmin.min.js"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="../../assets/js/setting-demo2.js"></script>

    <?php
      if (isset($_SESSION['flash_message'])) {

        if($_GET['status'] == 'error') {
          $message = $_SESSION['flash_message'];
          echo "<script>
              Swal.fire({
                  icon: 'error',
                  title: 'Terjadi Kesalahan',
                  text: '$message'
              });
          </script>";
          unset($_SESSION['flash_message']);
        }  elseif ($_GET['status'] == 'success') {
          $message = $_SESSION['flash_message'];
            echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: '$message'
                });
            </script>";
            unset($_SESSION['flash_message']); // Clear flash message after displaying it

        } elseif ($_GET['status'] == 'duplicate') {
          $message = $_SESSION['flash_message'];
            echo "<script>
                Swal.fire({
                    icon: 'warning',
                    title: 'gagal validasi',
                    text: '$message'
                });
            </script>";
            unset($_SESSION['flash_message']); // Clear flash message after displaying it

        } // Clear flash message after displaying it
      } 
    ?>

    <script>
      document.querySelectorAll('.delete-btn').forEach(button => {
          button.addEventListener('click', function() {
              const id = this.getAttribute('data-id');

              Swal.fire({
                  title: 'Konfirmasi Hapus?',
                  text: "Data tidak dapat dikembalikan",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Hapus',
                  cancelButtonText: 'Batal'
              }).then((result) => {
                  if (result.isConfirmed) {
                      window.location.href = 'hapus.php?id=' + id;
                  }
              })
          });
      });
    </script>
    <script>
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
