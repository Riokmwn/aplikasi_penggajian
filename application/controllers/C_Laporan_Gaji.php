<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Laporan_Gaji extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Data_Gaji');
        if (!$this->session->userdata('username')) {
            redirect('C_Auth');
        }
    }

    function data_laporan_gaji()
    {
        $selectedMonth = $this->input->get('bulan');
        $selectedYear = $this->input->get('tahun');

        $data['judul'] = 'Halaman Laporan Gaji';
        $data['rekap_gaji'] = $this->M_Data_Gaji->get_data_gaji_by_month_year($selectedMonth, $selectedYear);

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/laporan/laporan_gaji/v_laporan_gaji', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function data_laporan_gaji_print()
    {
        $selectedMonth = $this->input->get('bulan');
        $selectedYear = $this->input->get('tahun');

        $data['judul'] = 'Halaman Laporan Gaji';
        $data['rekap_gaji'] = $this->M_Data_Gaji->get_data_gaji_by_month_year($selectedMonth, $selectedYear);

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/laporan/laporan_gaji/v_laporan_gaji_print');
        $this->load->view('backend/dashboard/templates/footer');
    }
}
