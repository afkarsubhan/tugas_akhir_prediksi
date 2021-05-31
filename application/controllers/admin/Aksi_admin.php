<?php

class Aksi_admin extends CI_Controller
{
    function index()
    {
        redirect('admin/admin');
    }



    function tampil_employee()

    {
        $nama_produk = $this->input->get('nama_produk');
        if (empty($nama_produk)) {
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

        $ambil_data['data'] = $this->model_data->data_employee_divisi_join_kondisi($where);
        $ambil_data['produk'] = $this->model_data->tampil_data_kondisi('produk', $where);


        $this->load->view('admin/v_admin_data_employee', $ambil_data);
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

    function tampil_log()
    {
        $nama_produk = $this->input->get('nama_produk');
        if ($nama_produk == '') {
            //agar stay on current page
            $nama_produk = $this->session->flashdata('nama_produk');
        }

        $where = array(
            // 'id_case' =>  $this->input->get('id_case')
            'nama_produk' =>  $nama_produk
        );

        $ambil_data_produk['data_produk'] = $this->model_data->tampil_data('produk');
        $ambil_data['produk'] = $this->model_data->tampil_data_kondisi('produk', $where);

        $this->load->view('admin/v_admin_side_navbar', $ambil_data_produk);
        $this->load->view('admin/v_admin_top_navbar');



        $ambil_data['data'] = $this->model_data->ambil_data_log_kondisi($nama_produk);


        $this->load->view('admin/v_admin_data_log', $ambil_data);
    }




    //tambah divisi baru


    //tampil data employee
    function do_tambah_employee()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $produk = $this->input->post('list_id_produk');
        $nama_produk = $this->input->get('nama_produk');


        // print_r($id_produk);die();
        $data_insert = array(
            'username' => $username,
            'password' => $password,
            'id_produk' => $produk
        );
        $this->model_data->insert($data_insert, 'login');

        $data_insert_log_admin_activity = array(
            'aksi' => 'tambah employee',
            'produk' => $nama_produk,
            'item' => $username
        );

        $this->model_data->insert($data_insert_log_admin_activity, 'log_admin_activity');

        $this->session->set_flashdata('nama_produk', $nama_produk);
        redirect('admin/Aksi_Admin/tampil_employee');
    }
    //tamabh categories agar stay on page sesuai divisi
    function do_tambah_categories()
    {
        $bulan_penjualan = $this->input->post('bulan_penjualan');
        $Jumlah = $this->input->post('Jumlah');
        $produk = $this->input->post('list_id_produk');
        $nama_produk = $this->input->get('nama_produk');


        // print_r($id_produk);die();
        $data_insert = array(
            'bulan_penjualan' => $bulan_penjualan,
            'Jumlah' => $Jumlah,
            'id_produk' => $produk
        );
        $this->model_data->insert($data_insert, 'penjualan');

        $data_insert_log_admin_activity = array(
            'aksi' => 'tambah categories',
            'produk' => $nama_produk,
            'item' => $bulan_penjualan
        );

        $this->model_data->insert($data_insert_log_admin_activity, 'log_admin_activity');

        $this->session->set_flashdata('nama_produk', $nama_produk);
        redirect('admin/Aksi_Admin/tampil_category');
    }




    //function hapus data




    //function  edit data
    function do_edit_data_employee()
    {
        $id_login = $this->input->get('id_login');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $id_produk = $this->input->post('list_id_produk');


        $nama_produk = $this->input->get('nama_produk');

        $where = array(
            // 'id_case' =>  $this->input->get('id_case')
            'id_login' =>  $id_login,
        );

        $data = array(
            'username' => $username,
            'password' => $password,
            'id_produk' => $id_produk
        );

        $this->model_data->edit_data($where, $data, 'login');

        $data_insert_log_admin_activity = array(
            'aksi' => 'edit employee',
            'produk' => $nama_produk,
            'item' => $username
        );

        $this->model_data->insert($data_insert_log_admin_activity, 'log_admin_activity');

        $this->session->set_flashdata('nama_produk', $nama_produk);
        redirect('admin/Aksi_Admin/tampil_employee');
    }






    //function bacukp file delete
    // function move_upload_file()
    // {
    //     $uploads_dir = '/uploads';
    //     foreach ($_FILES["pictures"]["error"] as $key => $error)
    //      {
    //         if ($error == UPLOAD_ERR_OK)
    //          {
    //             $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
    //             $name = $_FILES["pictures"]["name"][$key];
    //             move_uploaded_file($tmp_name, "$uploads_dir/$name");
    //          }
    //      }
    // }

}
