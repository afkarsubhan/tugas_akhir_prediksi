<?php

class C_penjualan extends CI_Controller
{
    function index()
    {
        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');

        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_dashboard');
    }
    function tampil_penjualan()
    {
        $ambil_data['produk'] = $this->model_data->data_produk_all();
        $kode_barang = $this->input->get('kode_barang');

        $where = array(
            'produk.kode_barang' => $kode_barang
        );

        $ambil_data['penjualan'] = $this->model_data->data_penjualan($where);

        //PAKET SIDE BAR
        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');
        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_penjualan', $ambil_data);
    }

    function tampil_penjualan_all()
    {

        $ambil_data['penjualan'] = $this->model_data->data_penjualan_all();
        $ambil_data['produk'] = $this->model_data->data_produk_all();

        //PAKET SIDE BAR
        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');
        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_semuapenjualan', $ambil_data);
    }
    function tampil_edit_penjualan()
    {
        $ambil_data_produk['data_produk'] = $this->model_data->tampil_data('produk');
        $id_penjualan = $this->input->get('id_penjualan');

        $where = array(

            'id_penjualan' =>  $id_penjualan
        );
        $ambil_data['data_produk'] = $this->model_data->tampil_data_kondisi('penjualan', $where);
        $ambil_data['data'] = $this->model_data->tampil_data('produk');

        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');
        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_editpenjualan', $ambil_data);
    }
    function hapus_data_penjualan()
    {
        $id_penjualan = $this->input->get('id_penjualan');

        $where = array(
            'id_penjualan' =>  $id_penjualan
        );

        $this->model_data->delete($where, 'penjualan');
        redirect('admin/c_penjualan/tampil_penjualan_all');
    }
    function do_edit_data_penjualan()
    {
        $id_penjualan = $this->input->get('id_penjualan');
        $bulan_penjualan = $this->input->post('bulan_penjualan');
        $tahun_penjualan = $this->input->post('tahun_penjualan');
        $jumlah_penjualan = $this->input->post('jumlah_penjualan');

        $where = array(

            'id_penjualan' =>  $id_penjualan,
        );
        $data = array(
            'bulan_penjualan' => $bulan_penjualan,
            'tahun_penjualan' => $tahun_penjualan,
            'jumlah_penjualan' => $jumlah_penjualan

        );

        $this->model_data->edit_data($where, $data, 'penjualan');
        redirect('admin/c_penjualan/tampil_penjualan_all');
    }
    function do_tambah_penjualan()

    {

        $ambil_data_produk['data_produk'] = $this->model_data->tampil_data('produk');
        $bulan_penjualan = $this->input->post('bulan_penjualan');
        $tahun_penjualan = $this->input->post('tahun_penjualan');
        $jumlah_penjualan = $this->input->post('jumlah_penjualan');
        $id_produk = $this->input->post('id_produk');
        $id_produk = $this->get_produk_by_nama_produk($id_produk);


        $where = array(

            'id_produk' =>  $id_produk
        );

        // echo "<pre>";
        // print_r($id_produk);
        // exit;

        $data_insert = array(
            'bulan_penjualan' => $bulan_penjualan,
            'tahun_penjualan' => $tahun_penjualan,
            'jumlah_penjualan' => $jumlah_penjualan,
            'id_produk' => $id_produk
        );

        $ambil_data['data_produk'] = $this->model_data->tampil_data_kondisi('penjualan', $where);
        $this->model_data->insert($data_insert, 'penjualan');

        redirect('admin/c_penjualan/tampil_penjualan_all');
    }
    function tampil_import_penjualan()
    {
        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');
        $id_produk = $this->input->get('id_produk');

        $where = array(
            'id_produk' =>  $id_produk
        );

        $ambil_data['data'] = $this->model_data->tampil_data_kondisi('produk', $where);


        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_import_penjualan');
    }
    public function form()
    {
        $data = array(); // Buat variabel $data sebagai array
        if (isset($_POST['preview'])) { // Jika user menekan tombol Preview pada form
            // lakukan upload file dengan memanggil function upload
            $upload = $this->model_data->upload_file($this->filename);
            if ($upload['result'] == "success") { // Jika proses upload sukses
                // Load plugin PHPExcel nya
                include APPPATH . 'third_party/PHPExcel/PHPExcel.php';
                $excelreader = new PHPExcel_Reader_Excel2007();
                $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
                // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
                // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
                $data['sheet'] = $sheet;
            } else { // Jika proses upload gagal
                $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
        }
        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');
        $id_produk = $this->input->get('id_produk');

        $where = array(
            'id_produk' =>  $id_produk
        );

        $ambil_data['data'] = $this->model_data->tampil_data_kondisi('produk', $where);
        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');

        $this->load->view('admin/v_admin_import_penjualan', $data);
    }

    public function import()
    {

        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/' . $this->filename . '.xlsx'); // Load file yang telah diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

        // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
        $data = array();
        $unique_kode_barang = array();
        //   $data_kode_barang = array();

        $numrow = 1;
        foreach ($sheet as $row) {
            // Cek $numrow apakah lebih dari 1
            // Artinya karena baris pertama adalah nama-nama kolom
            // Jadi dilewat saja, tidak usah diimport
            if ($numrow > 1) {
                // Kita push (add) array data ke variabel data
                array_push($data, array(
                    'nama_produk' => $row['A'], // Insert data nis dari kolom A di excel
                    'kode_barang' => $row['B'], // Insert data nama dari kolom B di excel
                ));
                array_push(
                    $unique_kode_barang,
                    $row['B'], // Insert data nama dari kolom B di excel
                );
            }

            $numrow++; // Tambah 1 setiap kali looping
        }

        $unique_kode_barang = array_unique($unique_kode_barang);

        // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
        $this->model_data->insert_multiple_produk($data);
        $this->model_data->insert_multiple_kode_barang($unique_kode_barang);

        redirect("admin/C_penjualan/tampil_penjualan_all"); // Redirect ke halaman awal 
    }
    function get_produk_by_nama_produk($nama_produk)
    {
        $where = array(
            'produk.nama_produk' =>  $nama_produk
        );
        $data = $this->model_data->data_produk($where);
        // echo json_encode($data);
        return $data[0]['id_produk'];
    }
}
