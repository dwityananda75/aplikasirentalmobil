<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $page = "Dashboard";
  session_start();
  include 'auth/connect.php';
  include "part/head.php";
  include 'part_func/tgl_ind.php';
  $nasabah = mysqli_query($conn, "SELECT * FROM pegawai WHERE pekerjaan='2'");
  $pegawai = mysqli_query($conn, "SELECT * FROM pegawai WHERE pekerjaan='1'");
  ?>

  ?>
  <style>
    #link-no {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <?php
      include 'part/navbar.php';
      include 'part/sidebar.php';
      ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>


            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Menu Utama</h4>
                </div>
                <div class="card-body">
                  <div class="col-lg-12">
                    <div class="card card-large-icons">
                      <div class="card-icon bg-primary text-white">
                        <i class="fas fa-users"></i>
                      </div>
                      <div class="card-body">
                        <h4>Data Peminjam</h4>
                        <a href="peminjam.php" class="card-cta">Detail <i class="fas fa-chevron-right"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="card card-large-icons">
                      <div class="card-icon bg-danger text-white">
                        <i class="fas fa-credit-card"></i>
                      </div>
                      <div class="card-body">
                        <h4>Pembayaran Pinjaman</h4>
                        <a href="rotgen.php" class="card-cta">Detail <i class="fas fa-chevron-right"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="card card-large-icons">
                      <div class="card-icon bg-warning text-white">
                        <i class="fas fa-car"></i>
                      </div>
                      <div class="card-body">
                        <h4>Data Mobil</h4>
                        <a href="datamobil.php" class="card-cta">Detail <i class="fas fa-chevron-right"></i></a>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <?php include 'part/footer.php'; ?>
    </div>
  </div>

  <?php include "part/all-js.php"; ?>
</body>

</html>
