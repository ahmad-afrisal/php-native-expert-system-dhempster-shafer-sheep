 <!-- Navbar Start -->
    <nav
      class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 mb-3" style="border-bottom: 2px solid #404A3D;"
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
          <a href="index.php" class="nav-item nav-link">Home</a>

          <!-- profile -->
          <li class="nav-item dropdown">  
            <a href="#" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Profile
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="profil1.php">Sejarah</a></li>
              <li><a class="dropdown-item" href="profil2.php">Visi Misi</a></li>
              <li><a class="dropdown-item" href="profil3.php">Struktur Organisasi</a></li>
              <li><a class="dropdown-item" href="dokter.php">Dokter</a></li>
            </ul>
          </li> 
        <!-- end profile -->
        
        <!-- Berita -->
        <li class="nav-item dropdown">
            <a href="#" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Berita
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="berita.php">Artikel Kesehatan Hewan</a></li>
            </ul>
          </li>
        <!-- end Berita -->

        <!--informasi -->
          <li class="nav-item dropdown">  
            <a href="#" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Informasi
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="profil1.php">Jadwal Dokter</a></li>
              <li><a class="dropdown-item" href="profil2.php">Jadwal Pelayanan</a></li>
              <li><a class="dropdown-item" href="profil3.php">Manual Book</a></li>
              <li><a class="dropdown-item" href="profil4.php">Peraturan Yang Berlaku</a></li>
            </ul>
          </li> 
        <!-- end informasi -->

        <!-- Galeri -->
         <li class="nav-item dropdown">
          <a href="#" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Galeri
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="berita.php">Album Foto</a></li>
            <li><a class="dropdown-item" href="video.php">Video Kegiatan</a></li>
          </ul>
        </li>
       <!-- end Galeri -->
      <!-- fasilitas & layanan-->
          <li class="nav-item dropdown">
              <a href="#" class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Layanan
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="fasilitas.php">Fasilitas</a></li>
                <li><a class="dropdown-item" href="form_layanan.php">Layanan</a></li>
              </ul>
            </li>
      <!-- end fasilitas & layanan -->
          <a href="layanan.php" class="nav-item nav-link">Data Statistik</a>

        <div class="border-start ps-4 d-none d-lg-block">
          <a href="login.php" class="nav-item nav-link ">Login</a>
          <!-- <button type="button" class="btn btn-sm p-0">login</button> -->
        </div>
      </div>
    </nav>
    <!-- Navbar End -->
