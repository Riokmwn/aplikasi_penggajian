<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Laporan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('C_Auth');
        }
    }

    function laporan_gaji()
    {
        $data['judul'] = 'Halaman Laporan Gaji';
        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/transaksi/v_laporan_gaji');
        $this->load->view('backend/dashboard/templates/footer');
    }

    function slip_gaji()
    {
        $data['judul'] = 'Halaman Slip Gaji';
        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/transaksi/v_slip_gaji');
        $this->load->view('backend/dashboard/templates/footer');
    }
}
