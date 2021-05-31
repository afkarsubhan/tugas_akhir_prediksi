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

<body id="page-top">
  <div id="wrapper">
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <?php foreach ($produk as $ct) { ?>
          <h1 class="h3 mb-0 text-gray-800">DataTables Log <?php echo $ct['nama_produk'] ?> </h1>
        <?php
        }
        ?>

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
                    <th>Id_Log</th>
                    <th>Username</th>
                    <th>Aksi</th>
                    <th>Title Case</th>
                    <th>Item</th>
                    <th>Name Categories</th>
                    <th>Date</th>
                    <th>Division</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <!--  <tfoot>
                    <tr>
                        <th>Id Category Case</th>
                        <th>Name Category</th>
                        <th>Action</th>
                       </tr>
                    </tfoot> -->
                <tbody>

                  <?php
                  $number = 0;
                  ?>
                  <?php foreach ($data as $a) {
                    $number++;
                  ?>

                    <tr>
                      <td><?php echo $number ?></td>
                      <td><?php echo $a['id_log'] ?></td>
                      <td><?php echo $a['username'] ?></td>
                      <td><?php echo $a['aksi'] ?></td>
                      <td><?php echo $a['title_case'] ?></td>
                      <td><?php echo $a['item'] ?></td>
                      <td><?php echo $a['bulan_penjualan'] ?></td>
                      <td><?php echo $a['date'] ?></td>
                      <td><?php echo $a['produk'] ?></td>
                      <td>
                        <a href="<?php echo base_url('admin/aksi_admin/hapus_data_log') ?>?id_log=<?php echo $a['id_log'] ?>&nama_produk=<?php echo $a['produk'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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


  <!-- modal edit -->
  <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Update data Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form>
            <div class="form-group">
              <input class="form-control" type="text" placeholder="auto berisi devisi e opo" id="exampleFormControlReadonly" readonly>
            </div>
            <div class="form-group">
              <input class="form-control" type="text" placeholder="auto berisi id " id="exampleFormControlReadonly" readonly>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name Category" required="">
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-info">Update</button>
        </div>
      </div>
    </div>
  </div>
  <!-- modal delete -->
  <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure you want to delete ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </div>
  </div>
</body>

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