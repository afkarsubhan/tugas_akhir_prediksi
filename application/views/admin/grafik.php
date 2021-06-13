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

            <div class="row">
                <div class="col-lg-6">
                    <!-- Form Basic -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div id="grafik"></div>

                            <?php

                            foreach ($penjualan as $a) {
                                $tahun_penjualan[] = $a['tahun_penjualan']; //ambil bulan
                                $jumlah_penjualan[] = intval($a['jumlah_penjualan']); //ambil bulan

                            }


                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/admin/js/ruang-admin.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
    <script src="<?php echo base_url(); ?>assets/highcharts/series-label.js"></script>
    <script src="<?php echo base_url(); ?>assets/highcharts/exporting.js"></script>
    <script src="<?php echo base_url(); ?>assets/highcharts/export-data.js"></script>
    <script src="<?php echo base_url(); ?>assets/highcharts/accessibility.js"></script>

    <script type="text/javascript">
        Highcharts.chart('grafik', {
            chart: {
                type: 'areaspline'
            },
            title: {
                text: 'Grafik Peramalan Penjualan'
            },

            subtitle: {
                text: 'Toko 99 Blitar'
            },


            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 1000,
                y: 100,
                floating: true,
                borderWidth: 1,
                backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
            },
            xAxis: {
                categories: <?= json_encode($tahun_penjualan); ?>,
                plotBands: [{ // visualize the weekend
                    from: 30,
                    to: 35,
                    color: 'rgba(68, 170, 213, .2)'
                }]
            },
            yAxis: {
                title: {
                    text: 'Fruit units'
                }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' units'
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: 'Jane',
                data: <?= json_encode($jumlah_penjualan); ?>
            }]
        });
    </script>

</body>

</html>