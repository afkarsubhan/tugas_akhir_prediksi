<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo base_url(); ?>assets/admin/img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Dashboard</title>
  <link href="<?php echo base_url(); ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/admin/css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('admin/admin') ?>">
        <div class="sidebar-brand-icon">
          <img src="<?php echo base_url(); ?>assets/admin/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">RuangAdmin</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('admin/admin') ?>">
          <i class="fas fa-fw fa-table"></i>
          <span>Dashboard</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('admin/admin/list_data_selectionprediksi') ?>">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Prediction</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('admin/c_penjualan/tampil_penjualan_all') ?>">
          <i class="fas fa-fw fa-columns"></i>
          <span>Penjualan</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('admin/c_barang/tampil_barang') ?>">
          <i class="fas fa-fw fa-columns"></i>
          <span>Kategori Produk</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('admin/c_produk/tampil_produk_all') ?>">
          <i class="fas fa-fw fa-columns"></i>
          <span>Produk</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Kategori Produk
      </div>

      <?php
      $hitung = 0;
      ?>
      <?php foreach ($data_barang as $a) {
        $hitung++;
      ?>
        <li class="nav-item active">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap<?php echo $hitung ?>" aria-expanded="true" aria-controls="collapseBootstrap">
            <i class="far fa-fw fa-window-maximize"></i>
            <span><?php echo $a['kode_barang'] ?></span>
          </a>
          <div id="collapseBootstrap<?php echo $hitung ?>" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

              <a class="collapse-item" href="<?php echo base_url('admin/c_produk/tampil_produk') ?>?kode_barang=<?php echo  $a['kode_barang'] ?>">Jenis Produk <?php echo  $a['kode_barang'] ?></a>
              <a class="collapse-item" href="<?php echo base_url('admin/c_penjualan/tampil_penjualan') ?>?kode_barang=<?php echo  $a['kode_barang'] ?>">Penjualan Produk <?php echo  $a['kode_barang'] ?></a>

            </div>
          </div>
        </li>
      <?php
      }
      ?>


    </ul>
    <!-- Sidebar -->
    <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/ruang-admin.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/demo/chart-area-demo.js"></script>
</body>