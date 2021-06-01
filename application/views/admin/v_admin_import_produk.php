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
    <script>
  $(document).ready(function(){
    // Sembunyikan alert validasi kosong
    $("#kosong").hide();
  });
</script>
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Form Import Produk</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url('admin/c_produk/tampil_produk_all') ?>">Kembali ke Data Produk</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Forms update</li>
                </ol>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <!-- Form Basic -->
                    <div class="card mb-4">
                        <div class="card-body">
                        <a href="<?php echo base_url("excel/format.xlsx"); ?>" class="btn btn-light btn-icon-split">
                            <span class="icon text-gray-900">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                                <span class="text">Download format import data</span>
                        </a>
                        
                                <form method="post" action="<?php echo base_url('admin/C_produk/form') ?> enctype="multipart/form-data">
                                     <div class="form-group">
                                     <br>
                                        <div class="custom-file">
                                            <input type="file" name="file">
                                            <br>
                                            <label>Import Data From Excel</label>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary" name="preview" value="Preview" >Preview Data</button>
                                </form>
                                <?php
                            
                              if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form 
                                if(isset($upload_error)){ // Jika proses upload gagal
                                  echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
                                    die; // stop skrip
                                }
    
                              // Buat sebuah tag form untuk proses import data ke database
                              echo "<form method='post' action='".base_url("index.php/Siswa/import")."'>";
                              
                                // Buat sebuah div untuk alert validasi kosong
                                echo"<div style='color: red;' id='kosong'>Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                                </div>";
                                
                                echo"<table border='1' cellpadding='8'>
                                <tr>
                                  <th colspan='5'>Preview Data</th>
                                </tr>
                                <tr>
                                  <th>NIS</th>
                                  <th>Nama</th>
                                  <th>Jenis Kelamin</th>
                                  <th>Alamat</th>
                                </tr>";
                                
                                $numrow = 1;
                                $kosong = 0;
                                
                                // Lakukan perulangan dari data yang ada di excel
                                // $sheet adalah variabel yang dikirim dari controller
                                foreach($sheet as $row){ 
                                  // Ambil data pada excel sesuai Kolom
                                  $nis = $row['A']; // Ambil data NIS
                                  $nama = $row['B']; // Ambil data nama
                                  $jenis_kelamin = $row['C']; // Ambil data jenis kelamin
                                  $alamat = $row['D']; // Ambil data alamat
                                  
                                  // Cek jika semua data tidak diisi
                                  if($nis == "" && $nama == "" && $jenis_kelamin == "" && $alamat == "")
                                    continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
                                  
                                  // Cek $numrow apakah lebih dari 1
                                  // Artinya karena baris pertama adalah nama-nama kolom
                                  // Jadi dilewat saja, tidak usah diimport
                                  if($numrow > 1){
                                    // Validasi apakah semua data telah diisi
                                    $nis_td = ( ! empty($nis))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
                                    $nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
                                    $jk_td = ( ! empty($jenis_kelamin))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
                                    $alamat_td = ( ! empty($alamat))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
                                    
                                    // Jika salah satu data ada yang kosong
                                    if($nis == "" or $nama == "" or $jenis_kelamin == "" or $alamat == ""){
                                      $kosong++; // Tambah 1 variabel $kosong
                                    }
                                    
                                    echo "<tr>";
                                    echo "<td".$nis_td.">".$nis."</td>";
                                    echo "<td".$nama_td.">".$nama."</td>";
                                    echo "<td".$jk_td.">".$jenis_kelamin."</td>";
                                    echo "<td".$alamat_td.">".$alamat."</td>";
                                    echo "</tr>";
                                  }
                                  
                                  $numrow++; // Tambah 1 setiap kali looping
                                }
                                
                                echo "</table>";
                                
                                // Cek apakah variabel kosong lebih dari 0
                                // Jika lebih dari 0, berarti ada data yang masih kosong
                                if($kosong > 0){
                                ?>  
                                  <script>
                                  $(document).ready(function(){
                                    // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
                                    $("#jumlah_kosong").html('<?php echo $kosong; ?>');
                                    
                                    $("#kosong").show(); // Munculkan alert validasi kosong
                                  });
                                  </script>
                                <?php
                                }else{ // Jika semua data sudah diisi
                                  echo "<hr>";
                                  
                                  // Buat sebuah tombol untuk mengimport data ke database
                                  echo "<button type='submit' name='import'>Import</button>";
                                  echo "<a href='".base_url("index.php/Siswa")."'>Cancel</a>";
                                }
                                
                                echo "</form>";
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