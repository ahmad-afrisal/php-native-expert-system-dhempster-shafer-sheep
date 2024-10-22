
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
              <a href="index.html" class="logo">
                <img
                  src="assets/img/kaiadmin/logo_light.svg"
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
            <?php

          if(isset($_GET['tahun'])) {
            $tahun = $_GET['tahun'];
          } else {
            $tahun = date('Y');
          }

          if(isset($_GET['tahun_pemeriksaan'])) {
            $tahun_pemeriksaan = $_GET['tahun_pemeriksaan'];
          } else {
            $tahun_pemeriksaan = date('Y');
          }

          if(isset($_GET['kode_hewan'])) {
            $gkode_hewan = $_GET['kode_hewan'];

            $queryNamaHewan = mysqli_query($koneksi, "SELECT nama_hewan FROM tbl_jenis_hewan WHERE kode_hewan='$gkode_hewan' LIMIT 1");
            // $result = $mysqli->query($query);

            // Ambil kode hewan pertama
            if ($queryNamaHewan->num_rows > 0) {
                $rowHewan = $queryNamaHewan->fetch_assoc();
                $nama_hewan= $rowHewan['nama_hewan'];
            //     // echo "Kode hewan pertama: " . $kode_hewan_pertama;
            } else {
            //     echo "Tidak ada data hewan yang ditemukan.";
            }
          } else {
            $queryKodeHewan = mysqli_query($koneksi, "SELECT tbl_riwayat.kode_hewan, tbl_jenis_hewan.nama_hewan FROM tbl_riwayat JOIN tbl_jenis_hewan ON tbl_riwayat.kode_hewan=tbl_jenis_hewan.kode_hewan ORDER BY id ASC LIMIT 1");
            // $result = $mysqli->query($query);

            // Ambil kode hewan pertama
            if ($queryKodeHewan->num_rows > 0) {
                $roww = $queryKodeHewan->fetch_assoc();
                $nama_hewan= $roww['nama_hewan'];
                $gkode_hewan= $roww['kode_hewan'];
            //     // echo "Kode hewan pertama: " . $kode_hewan_pertama;
            } else {
            //     echo "Tidak ada data hewan yang ditemukan.";
            }
          }


          

        ?>
        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
                <h6 class="op-7 mb-2">Pusat Kesehatan Banggae</h6>
              </div>
              <!-- <div class="ms-md-auto py-2 py-md-0">
                <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
                <a href="#" class="btn btn-primary btn-round">Add Customer</a>
              </div> -->
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <?php
                        $queryDiagnosis = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlahDiagnosis FROM tbl_statistik_diagnosis");
                        while($dataDiagnosis = mysqli_fetch_array($queryDiagnosis)) {
                      ?>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Jumlah Diagnosis Online</p>
                          <h4 class="card-title"><?= $dataDiagnosis['jumlahDiagnosis']; ?></h4>
                        </div>
                      </div>
                      <?php
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small"
                        >
                          <i class="fas fa-pills"></i>
                        </div>
                      </div>
                      <?php
                          $queryPemeriksaan = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlahPemeriksaan FROM tbl_riwayat");
                          while($dataPemeriksaan = mysqli_fetch_array($queryPemeriksaan)) {
                        ?>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Jumlah Riwayat Pemeriksaan</p>
                          <h4 class="card-title"><?= $dataPemeriksaan['jumlahPemeriksaan'] ?></h4>
                        </div>
                      </div>
                      <?php
                          }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small"
                        >
                          <i class="fas fa-chess-knight"></i>
                        </div>
                      </div>
                        <?php
                          $queryJumlahHewan = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlahHewan FROM tbl_jenis_hewan");
                          while($dataHewan = mysqli_fetch_array($queryJumlahHewan)) {
                        ?>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Jenis Hewan</p>
                          <h4 class="card-title"><?= $dataHewan['jumlahHewan']; ?></h4>
                        </div>
                      </div>
                      <?php
                          }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              
              <!-- <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small"
                        >
                          <i class="far fa-check-circle"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Jumlah Pemeriksaan</p>
                          <h4 class="card-title">576</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
            </div>
            <div class="row">
              <div class="col-12">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row">
                      <div class="card-title">Statistik Pengunjung Online</div>
                        <div class="card-tools">
                         
                          <div class="btn-group dropdown">
                          <button
                            type="button"
                            class="btn btn-primary btn-sm dropdown-toggle"
                            data-bs-toggle="dropdown"
                          >
                            <span class="btn-label">
                              <?= $tahun; ?>
                            </span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li>
                              <a class="dropdown-item" href="index.php?tahun=2023">2023</a>
                              <a class="dropdown-item" href="index.php?tahun=2024">2024</a>
                              <!-- <a class="dropdown-item" href="index.php?tahun=2025">2025</a> -->
                              
                            </li>
                          </ul>
                        </div>
                        </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart-container" style="min-height: 375px">
                      <canvas id="statisticsChart"></canvas>
                    </div>
                    <div id="myChartLegend"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <div class="card-head-row">

                        <div class="card-title">Statistik Pemeriksaan Offline</div>
                          <div class="card-tools">
                            <div class="btn-group dropdown">
                            <button
                              type="button"
                              class="btn btn-primary btn-sm dropdown-toggle"
                              data-bs-toggle="dropdown"
                            >
                              <span class="btn-label">
                                <?= $tahun_pemeriksaan; ?>
                              </span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <li>
                                <a class="dropdown-item" href="index.php?tahun_pemeriksaan=2023">2023</a>
                                <a class="dropdown-item" href="index.php?tahun_pemeriksaan=2024">2024</a>
                                <!-- <a class="dropdown-item" href="index.php?tahun_pemeriksaan=2025">2025</a> -->
                                
                              </li>
                            </ul>
                          </div>
                            <div class="card-tools">
                            <div class="btn-group dropdown">
                            <button
                              type="button"
                              class="btn btn-primary btn-sm dropdown-toggle"
                              data-bs-toggle="dropdown"
                            >
                              <span class="btn-label">
                                <?= $nama_hewan; ?>
                              </span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                              <li>
                                <?php
                                   // Mengambil data dari Tabel Penyakit
                                $queryHewan = mysqli_query($koneksi, "SELECT * FROM tbl_jenis_hewan");
                                $no = 1;
                                while($dataHewan = mysqli_fetch_array($queryHewan)) {
                                  ?>
                                <a class="dropdown-item" href="index.php?tahun_pemeriksaan=<?=$tahun_pemeriksaan;?>&kode_hewan=<?= $dataHewan['kode_hewan'];?>"><?= $dataHewan['nama_hewan'];?></a>
                                  <?php
                                }
                                  ?>
                              </li>
                            </ul>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="chart-container" style="position: relative; height:100px; width: 100%;">
                      <canvas id="barChart"></canvas>
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

    <?php
      include '../components/script.php';
    ?>


    <?php
      $warna_hexa = [
        "#FF5733", // Red-Orange
        "#33FF57", // Green
        "#3357FF", // Blue
        "#FF33A1", // Pink
        "#FFD133", // Yellow
        "#33FFF1", // Cyan
        "#8D33FF", // Purple
        "#FF6F33", // Orange
        "#33FF88", // Light Green
        "#333FFF", // Indigo
        "#FF33F6", // Magenta
        "#FFC733", // Gold
        "#33FFDD", // Aqua
        "#A133FF", // Violet
        "#FFB833", // Peach
        "#33FFA7", // Mint
        "#5733FF", // Deep Blue
        "#FF3399", // Hot Pink
        "#FFFF33", // Bright Yellow
        "#33FF66"  // Lime Green
    ];

    // Query untuk mengambil data diagnosis dan nama penyakit
    $query = "
        SELECT 
            d.kode_penyakit, 
            p.nama_penyakit, 
            d.tanggal_diagnosis,
            MONTH(d.tanggal_diagnosis) AS bulan
        FROM 
            tbl_statistik_diagnosis d
        JOIN 
            tbl_penyakit p 
        ON 
            d.kode_penyakit = p.kode_penyakit
        WHERE 
            YEAR(d.tanggal_diagnosis) = $tahun
    ";

    $result = mysqli_query($koneksi, $query);

    // Simpan hasil query ke dalam array yang dikelompokkan per penyakit dan bulan
    $penyakit_data = [];

    // Inisialisasi array bulan
    $bulan_labels = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

    // Array untuk menyimpan data penyakit per bulan
    while ($row = mysqli_fetch_assoc($result)) {
        $nama_penyakit = $row['nama_penyakit'];
        $bulan = $row['bulan'];

        // Jika penyakit belum ada di array, inisialisasi
        if (!isset($penyakit_data[$nama_penyakit])) {
            $penyakit_data[$nama_penyakit] = array_fill(1, 12, 0); // Isi dengan 12 bulan (mulai dari 1 untuk Jan)
        }

        // Tambah hitungan di bulan yang sesuai
        $penyakit_data[$nama_penyakit][$bulan]++;
    }



    // Inisialisasi array untuk datasets
    $datasets = [];
    $penyakit_labels = [];

    // Proses data penyakit ke dalam format datasets
    foreach ($penyakit_data as $nama_penyakit => $data_per_bulan) {
        // Simpan penyakit sebagai label
        $penyakit_labels[] = $nama_penyakit;
        
        // Siapkan dataset untuk penyakit tersebut
        $datasets[] = [
            'label' => $nama_penyakit,
            'borderColor' => $warna_hexa[count($datasets) % count($warna_hexa)], // Pilih warna hexa berdasarkan indeks
            'pointRadius' => 0,
            'legendColor' => $warna_hexa[count($datasets) % count($warna_hexa)],
            'fill' => false,
            'borderWidth' => 2,
            'data' => array_values($data_per_bulan) // Data jumlah penyakit per bulan
        ];
    }

        // Query untuk mengambil data penyakit dan hewan
    $queryRiwayat = "SELECT jp.nama_penyakit, jh.nama_hewan,  COUNT(*) as total_pemeriksaan
                      FROM tbl_riwayat r
                      JOIN tbl_jenis_hewan jh ON r.kode_hewan = jh.kode_hewan
                      JOIN tbl_jenis_penyakit jp ON r.kode_penyakit = jp.kode_penyakit
                      WHERE YEAR(r.tgl_pemeriksaan) = $tahun_pemeriksaan
                      AND r.kode_hewan = '$gkode_hewan'
                      GROUP BY jp.nama_penyakit, jh.nama_hewan";
    $resultRiwayat =  mysqli_query($koneksi, $queryRiwayat);

    // Inisialisasi array untuk label (penyakit) dan datasets (hewan)
    $nama_penyakit = [];
    $nama_hewan = [];
    $total_pemeriksaan = [];

    while($row = $resultRiwayat->fetch_assoc()) {
        $nama_penyakit[] = $row['nama_penyakit'];
        $nama_hewan = $row['nama_hewan'];
        $total_pemeriksaan[] = $row['total_pemeriksaan'];
    }

    // Encode arrays into JSON for use in JavaScript
    $nama_penyakit_json = json_encode($nama_penyakit);
    $nama_hewan_json = json_encode($nama_hewan);
    $total_pemeriksaan_json = json_encode($total_pemeriksaan);


    ?>

    <!-- Chart JS -->
    <script src="../../assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <!-- <script src="../../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script> -->

    <!-- Chart Circle -->
    <script src="../../assets/js/plugin/chart-circle/circles.min.js"></script>


    <!-- Bootstrap Notify -->
    <script src="../../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="../../assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="../../assets/js/plugin/jsvectormap/world.js"></script>


    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="../../assets/js/setting-demo.js"></script>
 
  
 
    <script>

      //Chart

      var ctx = document.getElementById('statisticsChart').getContext('2d');

      var statisticsChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
          datasets:  <?php echo json_encode($datasets); ?>
        },
        options : {
          responsive: true, 
          maintainAspectRatio: false,
          legend: {
            display: false
          },
          tooltips: {
            bodySpacing: 4,
            mode:"nearest",
            intersect: 0,
            position:"nearest",
            xPadding:10,
            yPadding:10,
            caretPadding:10
          },
          layout:{
            padding:{left:5,right:5,top:15,bottom:15}
          },
          scales: {
            yAxes: [{
              ticks: {
                fontStyle: "500",
                beginAtZero: false,
                maxTicksLimit: 5,
                padding: 10
              },
              gridLines: {
                drawTicks: false,
                display: false
              }
            }],
            xAxes: [{
              gridLines: {
                zeroLineColor: "transparent"
              },
              ticks: {
                padding: 10,
                fontStyle: "500"
              }
            }]
          }, 
          legendCallback: function(chart) { 
            var text = []; 
            text.push('<ul class="' + chart.id + '-legend html-legend">'); 
            for (var i = 0; i < chart.data.datasets.length; i++) { 
              text.push('<li><span style="background-color:' + chart.data.datasets[i].legendColor + '"></span>'); 
              if (chart.data.datasets[i].label) { 
                text.push(chart.data.datasets[i].label); 
              } 
              text.push('</li>'); 
            } 
            text.push('</ul>'); 
            return text.join(''); 
          }  
        }
      });

      //  // Data dari PHP (labels dan datasets dinamis)
    

      var colors = <?php echo json_encode($warna_hexa); ?>;  // Ambil array warna dari PHP

      
      var myLegendContainer = document.getElementById("myChartLegend");

      var barChart = document.getElementById("barChart").getContext("2d");
      var myBarChart = new Chart(barChart, {
        type: "bar",
        data: {
          labels: <?php echo $nama_penyakit_json; ?>,
          datasets: [{
                    label: <?php echo $nama_hewan_json; ?>,
                    data: <?php echo $total_pemeriksaan_json; ?>,  // Total pemeriksaan sebagai data
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: true,
                  autoSkip: false, // Menonaktifkan auto-skip agar semua label tampil
                },
              },
            ],
            xAxes: [{
                ticks: {
                  beginAtZero: true,
                },
              }],
          },
        },
      });

      // generate HTML legend
      myLegendContainer.innerHTML = statisticsChart.generateLegend();

      // bind onClick event to all LI-tags of the legend
      var legendItems = myLegendContainer.getElementsByTagName('li');
      for (var i = 0; i < legendItems.length; i += 1) {
        legendItems[i].addEventListener("click", legendClickCallback, false);
      }
    </script>
  </body>
</html>
