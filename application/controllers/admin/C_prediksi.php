<?php

class C_prediksi extends CI_Controller
{

    function list_data_prediksi()
    {

        $ambil_data_produk['data_produk'] = $this->model_data->tampil_data('produk');
        $this->load->view('admin/v_admin_side_navbar', $ambil_data_produk);
        $this->load->view('admin/v_admin_top_navbar');
        // print_r($ambil_data['data']);die();
        $ambil_data['produk'] = $this->model_data->tampil_data('produk');
        $ambil_data['totalY'] = $this->model_data->jumlahPenjualan();
        $ambil_data['jumlah_row'] = $this->model_data->jumlahPenjualan_row();
        $ambil_data['tampil_periode'] = $this->model_data->mencariperiode();
        // print_r($ambil_data['produk']);
        // exit;
        $this->load->view('admin/v_prediction', $ambil_data);
    }

    function list_data_selectionprediksi()
    {
        $ambil_data_produk['data_produk'] = $this->model_data->tampil_data('produk');

        $ambil_data['produk'] = $this->model_data->tampil_data('produk');
        $ambil_data['totalY'] = $this->model_data->jumlahPenjualan();
        $ambil_data['tampil_periode'] = $this->model_data->mencariperiode();
        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');

        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_selectionprediksi', $ambil_data);
    }
    function tampil_prediksi()
    {
        $nama_produk = $this->input->get('nama_produk');
        if ($nama_produk == '') {
            //agar stay on current page
            $nama_produk = $this->session->flashdata('nama_produk');
        }

        $ambil_data_produk['data_produk'] = $this->model_data->tampil_data('produk');

        $this->load->view('admin/v_admin_side_navbar', $ambil_data_produk);
        $this->load->view('admin/v_admin_top_navbar');

        $where = array(
            // 'id_case' =>  $this->input->get('id_case')
            'nama_produk' =>  $nama_produk
        );

        $ambil_data['data'] = $this->model_data->data_categories_divisi_join_kondisi($where);
        $ambil_data['produk'] = $this->model_data->tampil_data_kondisi('produk', $where);


        $this->load->view('admin/v_selectionprediksi', $ambil_data);
    }

    function ambil_data_prediksi()
    {
        $modul = $this->input->post('modul');
        $id = $this->input->post('id');

        if ($modul == "produk") {
            echo $this->model_data->kabupaten($id);
        } else if ($modul == "produk") {
            echo $this->model_data->kecamatan($id);
        }
    }
}
