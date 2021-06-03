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
    <script type="text/javascript">
        $(function() {

            $.ajaxSetup({
                type: "POST",
                url: "<?php echo base_url('index.php/select/ambil_data') ?>",
                cache: false,
            });

            $("#Kategori_produk").change(function() {

                var value = $(this).val();
                if (value > 0) {
                    $.ajax({
                        data: {
                            modul: 'kabupaten',
                            id: value
                        },
                        success: function(respond) {
                            $("#kabupaten-kota").html(respond);
                        }
                    })
                }

            });
            $("#produk").change(function() {
                var value = $(this).val();
                if (value > 0) {
                    $.ajax({
                        data: {
                            modul: 'kecamatan',
                            id: value
                        },
                        success: function(respond) {
                            $("#kecamatan").html(respond);
                        }
                    })
                }
            })
        })
    </script>
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Form Prediksi</h1>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Basic -->
                    <div class="card mb-4">
                        <div class="card-body">

                            <form action="id_produk=" method="post">
                                <div class="form-group">
                                    <div class="col-lg-6">
                                        <label for="exampleInputEmail1">Kategori Produk</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="kode_barang">
                                            <option value="">Pilih Kategori Produk</option>
                                            <?php
                                            foreach ($nama_produk as $ct) {
                                            ?>
                                                <option value="<?php echo $ct['nama_produk'] ?>"><?php echo $ct['nama_produk'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                            </form>

                            <div class="form-group">
                                <div class="col-lg-6">
                                    <label for="exampleInputEmail1">Produk</label>
                                    <select class="form-control" id="exampleFormControlSelect1">
                                        <option value="">Pilih Produk</option>
                                        <?php
                                        foreach ($produk as $ct) {
                                        ?>
                                            <option value="<?php echo $ct['kode_barang'] ?>"><?php echo $ct['kode_barang'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="col-lg-8">
                                            <label for="exampleFormControlSelect1">Prediksi Bulan</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option value=januari>Januari</option>
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
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <div class="col-lg-6">
                                            <label for="exampleFormControlSelect1">Prediksi Tahun</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option value=></option>
                                                <option value=2017>2017</option>
                                                <option value=2018>2018</option>
                                                <option value=2019>2019</option>
                                                <option value=2020>2020</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Trend Projection</button>
                        </form>

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

    <script>
        function myFunction() {
            var x = document.getElementById("pilih_produk").value;
            console.log("masuk ngaceng", x);
        }
    </script>

    <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/ruang-admin.min.js"></script>

</body>

</html>