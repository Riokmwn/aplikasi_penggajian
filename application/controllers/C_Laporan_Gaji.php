<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Laporan_Gaji extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        if (!$this->session->userdata('username')) {
            redirect('C_Auth');
        }
    }

    function data_laporan_gaji()
    {
        $data['judul'] = 'Halaman Laporan Gaji';
        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/laporan/laporan_gaji/v_laporan_gaji');
        $this->load->view('backend/dashboard/templates/footer');
    }
}
