<?php

class C_produk extends CI_Controller
{
    function index()
    {
        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');

        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_dashboard');
    }

    // <?php
    // echo "<pre>";
    // print_r($data_barang);
    // exit;
    //

    function tampil_produk()
    {
        $kode_barang = $this->input->get('kode_barang');

        $where = array(
            'produk.kode_barang' => $kode_barang
        );

        $ambil_data['produk'] = $this->model_data->data_produk($where);

        //PAKET SIDE BAR
        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');
        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_data_semuaproduk', $ambil_data);
    }

    function tampil_produk_all()
    {
        $ambil_data['produk'] = $this->model_data->data_produk_all();

        //PAKET SIDE BAR
        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');
        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_data_semuaproduk', $ambil_data);
    }
    function tampil_edit_produk()
    {
        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');
        $id_produk = $this->input->get('id_produk');

        $where = array(
            'id_produk' =>  $id_produk
        );

        $ambil_data['data'] = $this->model_data->tampil_data_kondisi('produk', $where);


        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_edit_produk', $ambil_data);
    }
    function do_edit_data_produk()
    {
        $id_produk = $this->input->get('id_produk');
        $nama_produk = $this->input->post('nama_produk');
        $kode_barang = $this->input->post('kode_barang');

        $where = array(
            // 'id_case' =>  $this->input->get('id_case')
            'id_produk' =>  $id_produk,
        );
        $data = array(
            'nama_produk' => $nama_produk,
            'kode_barang' => $kode_barang
        );


        $this->model_data->edit_data($where, $data, 'produk');

        redirect('admin/c_produk/tampil_produk_all');
    }
    function hapus_data_produk()
    {
        $id_produk  = $this->input->get('id_produk');

        $where = array(
            'id_produk' =>  $id_produk
        );
        $this->model_data->delete($where, 'penjualan');
        $this->model_data->delete($where, 'produk');

        redirect('admin/c_produk/tampil_produk_all');
    }
    function tambah_produk()
    {
        $nama_produk = $this->input->post('nama_produk');
        $kode_barang = $this->input->post('kode_barang');

        $data_insert = array(

            'nama_produk' => $nama_produk,
            'kode_barang' => $kode_barang
        );

        $this->model_data->insert($data_insert, 'produk');
        redirect('admin/c_produk/tampil_produk_all');
    }

    function tampil_import_produk()
    {
        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');
        $id_produk = $this->input->get('id_produk');

        $where = array(
            'id_produk' =>  $id_produk
        );

        $ambil_data['data'] = $this->model_data->tampil_data_kondisi('produk', $where);


        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_import');
    }


    
    public function form(){
        $data = array(); // Buat variabel $data sebagai array
        if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
        // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
        $upload = $this->SiswaModel->upload_file($this->filename);    
            if($upload['result'] == "success"){ // Jika proses upload sukses
              // Load plugin PHPExcel nya
              include APPPATH.'third_party/PHPExcel/PHPExcel.php';
              $excelreader = new PHPExcel_Reader_Excel2007();
              $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
              $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
              // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
              // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
              $data['sheet'] = $sheet; 
            }else{ // Jika proses upload gagal
              $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
          }
          
          $this->load->view('form', $data);
        }
        
        public function import(){
          // Load plugin PHPExcel nya
          include APPPATH.'third_party/PHPExcel/PHPExcel.php';
          
          $excelreader = new PHPExcel_Reader_Excel2007();
          $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
          $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
          
          // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
          $data = array();
          
          $numrow = 1;
          foreach($sheet as $row){
            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if($numrow > 1){
              // Kita push (add) array data ke variabel data
              array_push($data, array(
                'nama_produk'=>$row['A'], // Insert data nis dari kolom A di excel
                'kode_barang'=>$row['B'], // Insert data nama dari kolom B di excel
              ));
            }
            
            $numrow++; // Tambah 1 setiap kali looping
          }
          // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
          $this->SiswaModel->insert_multiple($data);
          
          redirect("admin/c_produk/tampil_produk_all"); // Redirect ke halaman awal (ke controller siswa fungsi index)
        }
}
