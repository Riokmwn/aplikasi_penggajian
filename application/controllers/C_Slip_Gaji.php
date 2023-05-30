<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Slip_Gaji extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        if (!$this->session->userdata('username')) {
            redirect('C_Auth');
        }
    }

    function data_slip_gaji()
    {
        $data['judul'] = 'Halaman Slip Gaji';
        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/laporan/slip_gaji/v_slip_gaji');
        $this->load->view('backend/dashboard/templates/footer');
    }
}
