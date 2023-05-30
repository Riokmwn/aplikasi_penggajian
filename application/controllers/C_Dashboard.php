<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        if (!$this->session->userdata('username')) {
            redirect('C_Auth');
        }
    }

    function index()
    {
        $data['judul'] = 'Halaman Dashboard';
        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/dashboard/v_dashboard');
        $this->load->view('backend/dashboard/templates/footer');
    }

    function data_master()
    {
        $data['judul'] = 'Halaman Data Master';
        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/dashboard/v_dashboard_data_master');
        $this->load->view('backend/dashboard/templates/footer');
    }

    function transaksi()
    {
        $data['judul'] = 'Halaman Transaksi';
        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/dashboard/v_dashboard_transaksi');
        $this->load->view('backend/dashboard/templates/footer');
    }

    function laporan()
    {
        $data['judul'] = 'Halaman Laporan';
        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/dashboard/v_dashboard_laporan');
        $this->load->view('backend/dashboard/templates/footer');
    }
}
