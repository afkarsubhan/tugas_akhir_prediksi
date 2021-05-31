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
<?php
$totalXY = 0;
$totalX2 = 0;
$totalA = 0;
$totalB = 0;
$next_x = 0;
$next_y = 0;
$number = 0;


?>


<body id="page-top">
    <div id="wrapper">
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">



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
                                        <!-- <th>Id Category Case</th> -->
                                        <th>Name Category</th>
                                        <th>Jumlah Penjualan(Y)</th>
                                        <th>Periode(X)</th>
                                        <th>X^2</th>
                                        <th>XY</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php foreach ($data as $a) {
                                        $number++;
                                    ?>
                                        <tr>

                                            <td><?php echo $number ?></td>
                                            <td><?php echo $a['bulan_penjualan'] ?></td>
                                            <td><?php echo $a['jumlah'] ?></td>
                                            <td><?php echo $tampil_periode[$number] ?></td>
                                            <td>
                                                <?php
                                                $X2 = $tampil_periode[$number] * $tampil_periode[$number];
                                                $totalX2 = $totalX2 + $X2;
                                                echo $X2;
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $XY = $tampil_periode[$number] * $a['jumlah'];
                                                $totalXY = $totalXY + $XY;
                                                echo $XY;
                                                ?>
                                            </td>
                                            <td></td>



                                        </tr>

                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <td>Jumlah</td>
                                        <td></td>
                                        <td><?php echo $totalY; ?></td>
                                        <td>0</td>
                                        <td><?php echo $totalX2 ?></td>
                                        <td><?php echo $totalXY ?></td>
                                        <td></td>



                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- DataTable with Hover -->
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                <h3>Hasil</h3>
                                <tbody>
                                    <td><b>x</b></td>
                                    <td> x </td>
                                    <td>
                                        <?php
                                        $next_x = $number + 1;
                                        echo $next_x;
                                        ?>
                                    </td>

                                    </tr>

                                    <tr>
                                        <td><b>a</b></td>
                                        <td> &Sigma;y / n </td>
                                        <td><?php echo $totalY ?> / <?php echo $jumlah_row ?> </td>
                                        <td>
                                            <?php
                                            $totalA = $totalY / $jumlah_row;
                                            echo $totalA;
                                            ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><b>b</b></td>
                                        <td> &Sigma;xy / &Sigma;x^2 </td>
                                        <td><?php echo $totalXY ?> / <?php echo $totalX2 ?></td>
                                        <td>
                                            <?php
                                            $totalB = $totalXY / $totalX2;
                                            echo  $totalB;
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>y`</b></td>
                                        <td>a + b(x)</td>
                                        <td><?php echo $totalA ?> + <?php echo $totalB ?>*<?php echo $next_x ?></td>
                                        <td>
                                            <?php
                                            $next_y = $totalA + ($totalB * $next_x);
                                            echo $next_y;
                                            ?>
                                        </td>
                                    </tr>


                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- DataTable with Hover -->
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="table-responsive p-3">
                            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Number</th>

                                        <th>Bulan</th>
                                        <th>a</th>
                                        <th>b</th>
                                        <th>a + b (x)</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($data as $a) {
                                        $number++;
                                    ?>
                                        <tr>

                                            <td><?php echo $number ?></td>
                                            <td><?php echo $a['bulan_penjualan'] ?></td>
                                            <td><?php echo $totalA ?></td>
                                            <td><?php echo $totalB ?></td>
                                            <td>


                                                <?php
                                                $next_y = $totalA + ($totalB * $number);
                                                echo $next_y;
                                                ?>
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