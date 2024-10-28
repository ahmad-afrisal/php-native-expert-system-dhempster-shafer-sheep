<?php  
     if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
          $url = "https://";   
     else  
          $url = "http://";   
     // Append the host(domain name, ip) to the URL.   
     $url.= $_SERVER['HTTP_HOST'];   
     
     // Append the requested resource location to the URL   
     $url.= $_SERVER['REQUEST_URI'];    
          
     $pieces = explode("/",$url);
     $active = $pieces[4];
    
    
?>



<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="#" class="logo text-white">
              Puskeswan Banggae
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
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item <?= $active == 'dashboard' ? 'active' : ''; ?>">
                <a
                  href="../dashboard/index.php"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item <?= $active == 'hewan-statistik' ? 'active' : ''; ?>">
                <a href="../hewan-statistik/index.php">
                  <i class="fas fa-chess-knight"></i>
                  <p>Hewan</p>
                </a>
              </li>
              <li class="nav-item <?= $active == 'penyakit-statistik' ? 'active' : ''; ?>">
                <a href="../penyakit-statistik/index.php">
                  <i class="fas fa-pills"></i>
                  <p>Penyakit</p>
                </a>
              </li>
              <li class="nav-item <?= $active == 'riwayat-statistik' ? 'active' : ''; ?>">
                <a href="../riwayat-statistik/index.php">
                  <i class="fas fa-th-list"></i>
                  <p>Riwayat</p>
                </a>
              </li>
              <!-- <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li> -->
              <li class="nav-item <?= ($active == 'penyakit' || $active == 'hitung' || $active == 'gejala' || $active == 'relasi')? 'active submenu' : ''; ?>"> 
                <a data-bs-toggle="collapse" href="#tables">
                  <!-- <i class="fas fa-table"></i> -->
                  <i class="fas fa-database"></i>
                  <p>Pakar Kambing</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="tables">
                  <ul class="nav nav-collapse">
                    <li class="<?= $active == 'penyakit' ? 'active' : ''; ?>">
                      <a href="../penyakit/index.php">
                        <span class="sub-item">Penyakit Kambing</span>
                      </a>
                    </li>
                    <li class="<?= $active == 'gejala' ? 'active' : ''; ?>">
                      <a href="../gejala/index.php">
                        <span class="sub-item">Gejala Penyakit</span>
                      </a>
                    </li>
                    <li class="<?= $active == 'relasi' ? 'active' : ''; ?>">
                      <a href="../relasi/index.php">
                        <span class="sub-item">Aturan Gejala</span>
                      </a>
                    </li>
                    <li class="<?= $active == 'hitung' ? 'active' : ''; ?>">
                      <a href="../hitung/index.php">
                        <span class="sub-item">Diagnosis</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item <?= ($active == 'penyakit' || $active == 'hitung' || $active == 'gejala' || $active == 'relasi')? 'active submenu' : ''; ?>"> 
                <a data-bs-toggle="collapse" href="#profil">
                  <!-- <i class="fas fa-table"></i> -->
                  <i class="fas fa-database"></i>
                  <p>Profil</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="profil">
                  <ul class="nav nav-collapse">
                    <li class="<?= $active == 'berita' ? 'active' : ''; ?>">
                      <a href="../berita/index.php">
                        <span class="sub-item">Berita</span>
                      </a>
                    </li>
                    <li class="<?= $active == 'galeri' ? 'active' : ''; ?>">
                      <a href="../galeri/index.php">
                        <span class="sub-item">Galeri</span>
                      </a>
                    </li>
                    <li class="<?= $active == 'relasi' ? 'active' : ''; ?>">
                      <a href="../relasi/index.php">
                        <span class="sub-item">Aturan Gejala</span>
                      </a>
                    </li>
                    <li class="<?= $active == 'hitung' ? 'active' : ''; ?>">
                      <a href="../hitung/index.php">
                        <span class="sub-item">Diagnosis</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <!-- <li class="nav-item">
                <a href="../../includes/seeder.php">
                  <i class="fas fa-cogs"></i>
                  <p>Seeder</p>
                </a>
              </li> -->
              <!-- <li class="nav-section">
                <span class="sidebar-mini-icon">
                    <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Akun</h4>
            </li> -->
              <li class="nav-item">
                <a href="../../logout.php">
                  <i class="fas fa-sign-out-alt"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->