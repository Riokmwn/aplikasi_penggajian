<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User_Model');
        if (!$this->session->userdata('username')) {
            redirect('C_Auth');
        }
    }

    function rekap_absen()
    {
        $data['judul'] = 'Halaman Rekap Absen';
        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/transaksi/v_rekap_absen');
        $this->load->view('backend/dashboard/templates/footer');
    }

    function data_gaji()
    {
        $data['judul'] = 'Halaman Data Gaji';
        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/transaksi/v_data_gaji');
        $this->load->view('backend/dashboard/templates/footer');
    }
}
