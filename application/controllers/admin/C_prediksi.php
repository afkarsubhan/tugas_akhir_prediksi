<?php

class C_prediksi extends CI_Controller
{

    function list_data_prediksi()
    {
        $nama_produk = $this->input->post('pilih_produk_all');
        $prediksi_tahun = $this->input->post('prediksi_tahun');
        $prediksi_bulan = $this->input->post('prediksi_bulan');
        $id_produk = $this->get_produk_by_nama_produk($nama_produk);
        

        $ambil_data_penjualan['data_penjualan'] = $this->model_data->tampil_data('penjualan');
        
        $where = array(
            'id_produk' =>  $id_produk
        );

        $ambil_data['penjualan'] = $this->model_data->tampil_data_kondisi('penjualan', $where);

        // echo "<pre>";
        // print_r($ambil_data['penjualan']);
        // exit;
        // $stack = array(array('bulan' => "a",'tahun' => "a"),array('bulan' => "b",'tahun' => "b"));
        // array_push($stack, array('bulan' => "c", 'tahun' => "c"));
        // print_r($stack);
        // exit;
        $data_prediction = [];
        $ambil_data['last_penjualan'] = $this->model_data->getLastPenjualan($id_produk);                 
        $start_month_convert = $this->model_data->convert_month($ambil_data['last_penjualan']['bulan_penjualan']);        
        $end_month_prediction = $this->model_data->convert_month($prediksi_bulan);
        // $start = $month = strtotime($ambil_data['last_penjualan']['tahun_penjualan'] . '-' . $ambil_data['last_penjualan']['bulan_penjualan']);        
        $def_start = $ambil_data['last_penjualan']['tahun_penjualan'] . '-' . $start_month_convert;
        $def_end = $prediksi_tahun . '-' . $end_month_prediction;        
        // $start = $month = $year =  strtotime($def_start);
        $month = $year = strtotime($def_start);
        $month = strtotime("+1 month", $month);
        $end = strtotime($def_end);
        // $start = $month = $year =  strftime($def_start);                         
        
        while($month <= $end)
        {
            // echo date('F', $month), PHP_EOL;
            $month_convert = date('F', $month);            
            
            // echo date('Y', $month), PHP_EOL;
            $year_convert = date('Y', $month);
            $month = strtotime("+1 month", $month);

            array_push($data_prediction, array('bulan_penjualan' => $month_convert, 'tahun_penjualan' => $year_convert));
            // array_push($ambil_data['penjualan'], array('bulan_penjualan' => $month_convert, 'tahun_penjualan' => $year_convert));
            
        }
        // echo "<pre>";
        // print_r($ambil_data['penjualan']);
        // exit;
        $ambil_data['data_prediction'] = $data_prediction;
        $ambil_data['totalY'] = $this->model_data->jumlahPenjualan_byId($id_produk);        
        $ambil_data['jumlah_row'] = $this->model_data->jumlahPenjualan_row($id_produk);        
        $ambil_data['tampil_periode'] = $this->model_data->mencariperiode($id_produk);
        // print_r($ambil_data['tampil_periode']);
        // exit;

        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');
        // $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        // $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_prediction', $ambil_data);
    }

    function list_data_selectionprediksi()
    {
        $ambil_data_produk['data_produk'] = $this->model_data->tampil_data('produk');
        $ambil_data_produk['data_barang'] = $this->model_data->tampil_data('barang');
        $this->load->view('admin/v_admin_side_navbar', $ambil_data_produk);
        $this->load->view('admin/v_admin_top_navbar');
        // $ambil_data['data'] = $this->model_data->data_categories_divisi_join();

        // $ambil_data['produk'] = $this->model_data->tampil_data('produk');
        // $ambil_data['totalY'] = $this->model_data->jumlahPenjualan();
        // $ambil_data['tampil_periode'] = $this->model_data->mencariperiode();
        // $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');

        // $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        // $this->load->view('admin/v_admin_top_navbar');
        // $this->load->view('admin/v_selectionprediksi', $ambil_data);
        $this->load->view('admin/v_selectionprediksi');
    }

    function get_produk_by_kode_barang()
    {
        $id = $this->input->post('id');
        $where = array(
            'produk.kode_barang' =>  $id
        );
        $data = $this->model_data->data_produk($where);
        echo json_encode($data);
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
