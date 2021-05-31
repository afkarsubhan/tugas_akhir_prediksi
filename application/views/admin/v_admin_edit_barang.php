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
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/c_barang/tampil_barang') ?>">Kembali ke Data Kategori Produk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Forms update</li>
                </ol>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <!-- Form Basic -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <?php foreach ($data as $a) { ?>
                                <form action="<?php echo base_url('admin/c_barang/do_edit_data_barang') ?>?id_barang=<?php echo $a['id_barang'] ?>" method="post">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">id Kategori Produk</label>
                                        <input type="text" class="form-control" name="id_barang" aria-describedby="" required="" value="<?php echo $a['id_barang'] ?>" disabled="">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Kategori Produk</label>
                                        <input type="text" class="form-control" name="kode_barang" aria-describedby="" required="" value="<?php echo $a['kode_barang'] ?>">
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