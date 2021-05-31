<?php
class C_barang extends CI_Controller
{
    function index()
    {
        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');

        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_dashboard');
    }


    function tampil_barang()
    {
        $ambil_data_produk['data_barang'] = $this->model_data->tampil_data('barang');

        //PAKET SIDE BAR
        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');
        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_data_barang');
    }

    function tampil_edit_barang()
    {
        $ambil_data_barang['data_barang'] = $this->model_data->tampil_data('barang');
        $id_barang = $this->input->get('id_barang');

        $where = array(
            'id_barang' =>  $id_barang
        );

        $ambil_data['data'] = $this->model_data->tampil_data_kondisi('barang', $where);


        $this->load->view('admin/v_admin_side_navbar', $ambil_data_barang);
        $this->load->view('admin/v_admin_top_navbar');
        $this->load->view('admin/v_admin_edit_barang', $ambil_data);
    }
    function do_edit_data_barang()
    {
        $id_barang = $this->input->get('id_barang');
        $kode_barang = $this->input->post('kode_barang');

        $where = array(

            'id_barang' =>  $id_barang,
        );
        $data = array(
            'id_barang' => $id_barang,
            'kode_barang' => $kode_barang
        );


        $this->model_data->edit_data($where, $data, 'barang');

        redirect('admin/c_barang/tampil_barang');
    }
    function hapus_data_barang()
    {
        $id_barang  = $this->input->get('id_barang');

        $where = array(
            'id_barang' =>  $id_barang
        );
        $this->model_data->delete($where, 'barang');
        redirect('admin/c_barang/tampil_barang');
    }
    function tambah_barang()
    {
        $id_barang = $this->input->post('id_barang');
        $kode_barang = $this->input->post('kode_barang');

        $data_insert = array(

            'id_barang' => $id_barang,
            'kode_barang' => $kode_barang
        );

        $this->model_data->insert($data_insert, 'barang');
        redirect('admin/c_barang/tampil_barang');
    }
}
