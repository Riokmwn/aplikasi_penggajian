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
        $this->db->select('karyawan.id_karyawan, karyawan.*, jenis_kelamin.*, jabatan.*, status_karyawan.*, rekap_absen.rekap_absen_hadir, rekap_absen.rekap_absen_telat, rekap_absen.rekap_absen_izin, rekap_absen.rekap_absen_sakit, rekap_absen.rekap_absen_tidak_hadir, rekap_gaji.*');
        $this->db->from('karyawan');
        $this->db->join('jenis_kelamin', 'karyawan.jenis_kelamin_id = jenis_kelamin.id_jenis_kelamin');
        $this->db->join('jabatan', 'karyawan.jabatan_id = jabatan.id_jabatan');
        $this->db->join('status_karyawan', 'karyawan.status_karyawan_id = status_karyawan.id_status_karyawan');
        $this->db->join('rekap_absen', 'karyawan.id_karyawan = rekap_absen.karyawan_id');
        $this->db->join('rekap_gaji', 'karyawan.id_karyawan = rekap_gaji.karyawan_id');
        $this->db->group_by('karyawan.id_karyawan, rekap_gaji.rekap_gaji_bulan, rekap_gaji.rekap_gaji_tahun');
        if ($_SESSION['role_id'] == 2) {
            $this->db->where('karyawan.user_id', $_SESSION['id_users']);
        }else{
            $this->db->where('id_karyawan', $karyawan);
        }
        $this->db->like('rekap_gaji_bulan', $selectedMonth);
        $this->db->like('rekap_gaji_tahun', $selectedYear);
        
        $data['slip_gaji'] = $this->db->get()->row();

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/laporan/slip_gaji/v_slip_gaji_print', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }
}
