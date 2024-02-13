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
        $this->settings = $this->db->get('pengaturan')->row();
        if (!$this->settings) {
            $this->settings = new stdClass();
            $this->settings->jam_masuk = '08:00:00';
            $this->settings->jam_keluar = '17:00:00';
            $this->settings->menit_masuk_toleransi = '10';
        }
        $this->time_setting = array(
            'jam_masuk' => date("H:i:s", strtotime($this->settings->menit_masuk_toleransi . ' minutes', strtotime($this->settings->jam_masuk))),
            'jam_keluar' => $this->settings->jam_keluar,
            'start_lembur' => date("H:i:s", strtotime('1 hour', strtotime($this->settings->jam_keluar))),
        );
    }

    function index()
    {
        $data['judul'] = 'Halaman Dashboard';
        $data['jumlah_karyawan'] = $this->db->get('karyawan')->num_rows();
        $data['jumlah_posisi'] = $this->db->get('posisi')->num_rows();
        $data['penalti_karyawan'] = $this->getPenalti();

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/dashboard/v_dashboard');
        $this->load->view('backend/dashboard/templates/footer');
    }

    function getPenalti()
    {
        $jam_masuk = $this->time_setting['jam_masuk'];
        $jam_keluar = $this->time_setting['jam_keluar'];
        $start_lembur = $this->time_setting['start_lembur'];

        if ($_SESSION['role_id'] == 2) {
            $where = "AND id_karyawan = '" . $_SESSION['karyawan_id'] . "'";
        }else{
            $where = '';
        }

        $result = $this->db->query("
        
            SELECT
            id_karyawan,
            nama_karyawan,
            SUM(
                CASE
                    WHEN TIME_FORMAT( waktu_checkin, '%H:%i:%s' ) > '$jam_masuk'
                    THEN 1
                    ELSE 0 
                END
            ) AS parameter_telat,
            SUM(
                CASE
                    WHEN TIME_FORMAT( waktu_checkout, '%H:%i:%s' ) < '$jam_keluar'
                    THEN 1
                    ELSE 0
                END 
            ) AS parameter_checkout_awal
            
            FROM kehadiran
            JOIN karyawan ON karyawan.id_karyawan = kehadiran.karyawan_id

            WHERE MONTH(waktu_checkin) = 01
            AND YEAR(waktu_checkin) = ".date('Y')."
            $where

            GROUP BY karyawan_id
            ORDER BY nama_karyawan
            
        
        ")->result();

        return $result;
    }
}
