<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Slip_Gaji extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Karyawan');
        $this->load->model('M_Data_Gaji');
    }

    function data_slip_gaji()
    {
        if (!$this->session->userdata('username')) {
            redirect('C_Auth');
        }
        $data['judul'] = 'Halaman Slip Gaji';
        $data['karyawan'] = $this->M_Karyawan->get_all_karyawan();

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/laporan/slip_gaji/v_slip_gaji');
        $this->load->view('backend/dashboard/templates/footer');
    }

    function data_slip_gaji_print()
    {
        $selectedMonth = $this->input->get('bulan');
        $selectedYear = $this->input->get('tahun');
        $karyawan = $this->input->get('karyawan');

        $data['judul'] = 'Halaman Laporan Gaji';
        $data['slip_gaji'] = $this->M_Data_Gaji->get_data_gaji_by_month_year_karyawan($selectedMonth, $selectedYear, $karyawan);

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/laporan/slip_gaji/v_slip_gaji_print', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }
}
