<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Data_Gaji extends CI_Controller
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

    function data_gaji()
    {
        $selectedMonth = $this->input->get('bulan');
        $selectedYear = $this->input->get('tahun');
        $search = $this->input->get('search');

        if (!empty($selectedMonth) && !empty($selectedYear)) {
            $data['judul'] = 'Halaman Data Gaji';
            $data['rekap_gaji'] = $this->M_Data_Gaji->get_data_gaji_by_month_year($selectedMonth, $selectedYear);
        } else if ($search) {
            $data['judul'] = 'Halaman Data Gaji';
            $data['search'] = $search;
            $data['rekap_gaji'] = $this->M_Data_Gaji->search_data_gaji($search);
        } else {
            $data['judul'] = 'Halaman Data Gaji';
            $data['rekap_gaji'] = $this->M_Data_Gaji->get_all_rekap_gaji();
        }
        
        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/transaksi/data_gaji/v_data_gaji', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }
}