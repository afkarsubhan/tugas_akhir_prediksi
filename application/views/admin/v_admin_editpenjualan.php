<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>RuangAdmin - Forms</title>
  <link href="<?php echo base_url(); ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/admin/css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">

    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Update</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('admin/c_penjualan/tampil_penjualan_all') ?>">Kembali ke Data Penjualan</a></li>
          <li class="breadcrumb-item active" aria-current="page">Forms update</li>
        </ol>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <!-- Form Basic -->
          <div class="card mb-4">
            <div class="card-body">
              <?php foreach ($data_produk as $a) { ?>
                <form action="<?php echo base_url('admin/c_penjualan/do_edit_data_penjualan') ?>?id_penjualan=<?php echo $a['id_penjualan'] ?>" method="post">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Id Penjualan</label>
                    <input type="text" class="form-control" id="id" aria-describedby="" name="id_penjualan" required="" value="<?php echo $a['id_penjualan'] ?>" disabled>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Bulan Penjualan</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="bulan_penjualan">
                      <option value=<?php echo $a['bulan_penjualan'] ?>><?php echo $a['bulan_penjualan'] ?></option>
                      <option value=>Ganti Bulan Penjualan</option>
                      <option value=Januari>Januari</option>
                      <option value=Februari>Februari</option>
                      <option value=Maret>Maret</option>
                      <option value=April>April</option>
                      <option value=Mei>Mei</option>
                      <option value=Juni>Juni</option>
                      <option value=Juli>Juli</option>
                      <option value=Agustus>Agustus</option>
                      <option value=September>September</option>
                      <option value=Oktober>Oktober</option>
                      <option value=November>November</option>
                      <option value=Desember>Desember</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tahun Penjualan</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="tahun_penjualan">
                      <option value=<?php echo $a['tahun_penjualan'] ?>><?php echo $a['tahun_penjualan'] ?></option>
                      <option value=>Ganti Tahun Penjualan</option>
                      <option value=2016>2016</option>
                      <option value=2017>2017</option>
                      <option value=2018>2018</option>
                      <option value=2019>2019</option>
                      <option value=2020>2020</option>
                      <option value=2021>2021</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Karton</label>
                    <input type="text" class="form-control" name="jumlah_penjualan" aria-describedby="" required="" value="<?php echo $a['jumlah_penjualan'] ?>">
                  </div>

                  <br>
                  <button type="submit" class="btn btn-primary">Update</button>
                </form>
              <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
      <!--Row-->

      <!-- Documentation Link -->

    </div>
    <!---Container Fluid-->
  </div>
  </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/admin/js/ruang-admin.min.js"></script>

</body>

</html>