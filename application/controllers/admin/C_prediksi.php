<?php

class C_prediksi extends CI_Controller
{


    function list_data_prediksi()
    {
        $id_produk = $this->input->post('pilih_produk');
        $prediksi_tahun = $this->input->post('prediksi_tahun');
        $prediksi_bulan = $this->input->post('prediksi_bulan');


        $ambil_data_penjualan['data_penjualan'] = $this->model_data->tampil_data('penjualan');


        $ambil_data['penjualan'] = $this->model_data->tampil_data('penjualan');
        $ambil_data['totalY'] = $this->model_data->jumlahPenjualan();
        $ambil_data['jumlah_row'] = $this->model_data->jumlahPenjualan_row();
        $ambil_data['tampil_periode'] = $this->model_data->mencariperiode();
        // print_r($ambil_data['produk']);
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

        $ambil_data['produk'] = $this->model_data->tampil_data('produk');
        $ambil_data['totalY'] = $this->model_data->jumlahPenjualan();
        $ambil_data['tampil_periode'] = $this->model_data->mencariperiode();
        // $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');

        // $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        // $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_selectionprediksi', $ambil_data);
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
    function grafik()
    {

        $ambil_data['penjualan'] = $this->model_data->tampil_data('penjualan');
        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');

        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/grafik', $ambil_data);
    }
}
