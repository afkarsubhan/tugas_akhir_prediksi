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
        $kode_barang = $this->input->get('kode_barang');

        $where = array(
            'produk.kode_barang' => $kode_barang
        );

        $ambil_data['penjualan'] = $this->model_data->data_penjualan($where);

        //PAKET SIDE BAR
        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');
        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_semuapenjualan', $ambil_data);
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
        $where = array(

            'id_produk' =>  $id_produk
        );

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
}
