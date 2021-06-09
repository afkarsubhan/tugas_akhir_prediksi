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
                            <form action="<?php echo base_url('admin/C_prediksi/list_data_prediksi') ?>" method="post">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Kategori Barang</label>
                                                <select class="form-control" id="pilih_kategori" name="list_id_kategori">
                                                    <option value="">Pilih Kategori Barang</option>
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
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name Produk</label>
                                                <select class="form-control" id="pilih_produk" name="pilih_produk" disabled>
                                                    <option value="">Pilih Produk</option>
                                                    <?php
                                                    foreach ($produk as $ct) {
                                                    ?>
                                                        <option value="<?php echo $ct['id_produk'] ?>"><?php echo $ct['nama_produk'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="col">
                                                    <label for="exampleFormControlSelect1">Prediksi Tahun</label>
                                                    <select class="form-control" id="prediksi_tahun" name="prediksi_tahun">
                                                        <option value=>Pilih Tahun</option>
                                                        <option value=2021>2021</option>
                                                        <option value=2022>2022</option>
                                                        <option value=2023>2023</option>
                                                        <option value=2024>2024</option>
                                                        <option value=2025>2025</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <div class="col">
                                                    <label for="exampleFormControlSelect1">Prediksi Bulan</label>
                                                    <select class="form-control" id="prediksi_bulan" name="prediksi_bulan">>
                                                        <option value=>Pilih Bulan</option>
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
        $(document).ready(function() {
            $('#pilih_kategori').change(function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo base_url(); ?>admin/C_prediksi/get_produk_by_kode_barang",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: false,
                    dataType: 'json',
                    success: function(data) {
                        $('#pilih_produk').prop("disabled", false);
                        var html = '';
                        var i;
                        for (i = 0; i < data.length; i++) {
                            html += '<option>' + data[i].nama_produk + '</option>';
                        }
                        $('#pilih_produk').html(html);

                    }
                });
            });
        });
    </script>

    <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/ruang-admin.min.js"></script>

</body>

</html>