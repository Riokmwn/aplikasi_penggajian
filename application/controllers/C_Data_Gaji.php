<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Data_Gaji extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        if (!$this->session->userdata('username')) {
            redirect('C_Auth');
        }
    }

    function data_gaji()
    {
        $data['judul'] = 'Halaman Data Gaji';
        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/transaksi/data_gaji/v_data_gaji');
        $this->load->view('backend/dashboard/templates/footer');
    }
}
