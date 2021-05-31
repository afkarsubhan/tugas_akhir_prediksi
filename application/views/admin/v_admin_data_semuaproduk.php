<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="<?php echo base_url(); ?>assets/admin/img/logo/logosisi.png" rel="icon">
  <title>Administrator</title>
  <link href="<?php echo base_url(); ?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url(); ?>assets/admin/css/ruang-admin.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<style>
.warna {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
}
</style>


<body id="page-top">
  <div id="wrapper">
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Produk</h1>
        <ol class="breadcrumb">

          <button href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#tambahproduk" id="#modalCenter">
            <span class="icon text-white-50">
              <i class="fas fa-arrow-right"></i>
            </span>
            <span class="text">Tambah Produk</span>
          </button>
        </ol>
      </div>

      <!-- Row -->
      <div class="row">
        <!-- DataTable with Hover -->
        <div class="col-lg-12">
          <div class="card mb-4">
            <div class="table-responsive p-3">
              <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                <thead class="thead-light">
                  <tr>
                    <th>Number</th>

                    <th>Nama Produk</th>
                    <th>Kategori Produk</th>

                    <th>Aksi</th>
                    <th>
                    </th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $number = 0;
                  ?>
                  <?php foreach ($produk as $a) {
                    $number++;
                  ?>

                    <tr>

                      <td><?php echo $number ?></td>

                      <td><?php echo $a['nama_produk'] ?></td>
                      <td><?php echo $a['kode_barang'] ?></td>

                      <td><a href="<?php echo base_url('admin/c_produk/tampil_edit_produk') ?>?id_produk=<?php echo $a['id_produk'] ?>" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                        <a href="<?php echo base_url('admin/c_produk/hapus_data_produk') ?>?id_produk=<?php echo $a['id_produk'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>


                      </td>
                      <td></td>

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
      <!--Row-->

    </div>
    <!---Container Fluid-->
  </div>
  </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- modal tambah members -->
  <div class="modal fade" id="tambahproduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Tambah Produk 
          
          </h5>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('admin/c_produk/tambah_produk') ?>" method="post">
            <div class="form-group">
              <input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Nama Produk" required="" name="nama_produk">
            </div>

            <div class="form-group">
              <label for="exampleFormControlSelect1"></label>
              <select class="form-control" id="exampleFormControlSelect1" name="kode_barang">
                <option value="">Pilih Kategori Produk</option>
                <?php
                foreach ($data_barang as $ct) {
                ?>
                  <option value="<?php echo $ct['kode_barang'] ?>"><?php echo $ct['kode_barang'] ?></option>
                <?php
                }
                ?>
              </select>
            </div>



        </div>
        <div class="modal-footer">
                
        <a type="button" class="warna" href="<?php echo base_url('admin/c_produk/tampil_import_produk') ?>">Import Data From Excel</a>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</body>

<!-- <div class="form-group">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Import Data From Excel</label>
              </div>
            </div> -->

<script src="<?php echo base_url(); ?>assets/admin/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/js/ruang-admin.min.js"></script>
<!-- Page level plugins -->
<script src="<?php echo base_url(); ?>assets/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable(); // ID From dataTable 
    $('#dataTableHover').DataTable(); // ID From dataTable with Hover
  });
</script>

</body>

</html>