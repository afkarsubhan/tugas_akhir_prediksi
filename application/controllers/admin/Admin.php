<?php

class Admin extends CI_Controller
{
    function index()
    {
        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');

        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_dashboard');
    }

    function list_data_employee()
    {
        $ambil_data_produk['data_produk'] = $this->model_data->tampil_data('produk');

        $this->load->view('admin/v_admin_side_navbar', $ambil_data_produk);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_dashboard');

        $ambil_data['data'] = $this->model_data->data_employee_divisi_join();
        //menampilkan divisi di combo box modal
        $ambil_data['produk'] = $this->model_data->tampil_data('produk');

        $this->load->view('admin/v_admin_alldata_employee', $ambil_data);
    }

    function list_data_prediksi()
    {

        $ambil_data_produk['data_produk'] = $this->model_data->tampil_data('produk');
        $this->load->view('admin/v_admin_side_navbar', $ambil_data_produk);
        $this->load->view('admin/v_admin_top_navbar');
        $ambil_data['data'] = $this->model_data->data_categories_divisi_join();
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
        $this->load->view('admin/v_admin_side_navbar', $ambil_data_produk);
        $this->load->view('admin/v_admin_top_navbar');
        $ambil_data['data'] = $this->model_data->data_categories_divisi_join();

        $ambil_data['produk'] = $this->model_data->tampil_data('produk');
        $ambil_data['totalY'] = $this->model_data->jumlahPenjualan();
        $ambil_data['tampil_periode'] = $this->model_data->mencariperiode();

        $this->load->view('admin/v_selectionprediksi', $ambil_data);
    }

    function list_data_log()
    {
        $ambil_data_produk['data_produk'] = $this->model_data->tampil_data('produk');

        $this->load->view('admin/v_admin_side_navbar', $ambil_data_produk);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_dashboard');

        $ambil_data['data'] = $this->model_data->tampil_data('log_activity');

        $this->load->view('admin/v_admin_alldata_log', $ambil_data);
    }

    //tampil edit

    function tampil_edit_employee()
    {
        $ambil_data_produk['data_produk'] = $this->model_data->tampil_data('produk');
        $id_login = $this->input->get('id_login');

        $where = array(
            // 'id_case' =>  $this->input->get('id_case')
            'id_login' =>  $id_login
        );

        $ambil_data['data'] = $this->model_data->data_employee_divisi_join_kondisi($where);
        $ambil_data['produk'] = $this->model_data->tampil_data('produk');


        $this->load->view('admin/v_admin_side_navbar', $ambil_data_produk);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_editemployee', $ambil_data);
    }
}
