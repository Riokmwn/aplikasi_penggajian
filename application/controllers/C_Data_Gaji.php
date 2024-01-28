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
        $selectedMonth = $this->input->get('bulan') ?? '';
        $selectedYear = $this->input->get('tahun') ?? '';
        $search = $this->input->get('search') ?? '';

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
        }
        $this->db->like('rekap_gaji_bulan', $selectedMonth);
        $this->db->like('rekap_gaji_tahun', $selectedYear);
        $this->db->like('nik_karyawan', $search);
        $this->db->like('karyawan_nama', $search);
        
        $data['rekap_gaji'] = $this->db->get()->result();
        $data['judul'] = 'Data Gaji';

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/transaksi/data_gaji/v_data_gaji', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function data_gaji_print()
    {
        $selectedMonth = $this->input->get('bulan');
        $selectedYear = $this->input->get('tahun');

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
        }
        $this->db->like('rekap_gaji_bulan', $selectedMonth);
        $this->db->like('rekap_gaji_tahun', $selectedYear);
        
        $data['rekap_gaji'] = $this->db->get()->result();

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/transaksi/data_gaji/v_data_gaji_print', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function check_data_existence()
    {
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        // Lakukan pengecekan keberadaan data dalam tabel rekap_gaji
        $dataExists = $this->M_Data_Gaji->check_data_existence($bulan, $tahun);

        // Berikan respons berdasarkan keberadaan data
        if ($dataExists) {
            echo 'true';
        } else {
            echo 'false';
        }
    }
}
