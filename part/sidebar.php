<?php
$judul = "Aplikasi Rental Mobil";
$pecahjudul = explode(" ", $judul);
$acronym = "";

foreach ($pecahjudul as $w) {
  $acronym .= $w[0];
}
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html"><?php echo $judul; ?></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html"><?php echo $acronym; ?></a>
    </div>
    <ul class="sidebar-menu">
      <li <?php echo ($page == "Dashboard") ? "class=active" : ""; ?>><a class="nav-link" href="index.php"><i class="fas fa-info-circle"></i><span>Dashboard</span></a></li>
      <li class="menu-header">Menu</li>

      <li <?php echo ($page == "Data Peminjam") ? "class=active" : ""; ?>><a href="datapeminjam.php"><i class="fas fa-users"></i> <span>Data Peminjam</span></a></li>
      <li <?php echo ($page == "Data Pembayaran") ? "class=active" : ""; ?>><a href="datapembayaran.php"><i class="fas fa-credit-card"></i> <span>Data Pembayaran</span></a></li>
      <li <?php echo ($page == "Data Mobil") ? "class=active" : ""; ?>><a href="datamobil.php" class="nav-link"><i class="fas fa-car"></i> <span>Data Mobil</span></a></li>
  </aside>
</div>
