<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GajiController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->library(array());
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
        
        $data['judul'] = 'Pembayaran Gaji';
        $data['bulan'] = $_POST['bulan'] ?? date('m');
        $data['tahun'] = $_POST['tahun'] ?? date('Y');

        if (isset($_POST['rekap'])) {
            $data_rekap = $this->generateGaji($data['bulan'], $data['tahun'], $_POST['rekap']);
            if (!$data_rekap['karyawan_id']) {
                $get_karyawan = $this->db->get_where('karyawan', ['id_karyawan' => $_POST['rekap']])->row();
                $data_rekap = [
                    'karyawan_id' => $get_karyawan->id_karyawan,
                    'posisi_id' => $get_karyawan->posisi_id,
                    'rekap_gaji_bulan' => $data['bulan'],
                    'rekap_gaji_tahun' => $data['tahun'],
                    'total_hari_masuk' => 0,
                    'total_hari_telat' => 0,
                    'total_hari_checkout_awal' => 0,
                    'total_jam_lembur' => 0,
                    'bayaran_harian' => 0,
                    'bayaran_konsumsi_harian' => 0,
                    'bayaran_transportasi_harian' => 0,
                    'bayaran_lembur_perjam' => 0,
                    'bayaran_penalti' => 0,
                    'total_bayaran_harian' => 0,
                    'total_bayaran_konsumsi_harian' => 0,
                    'total_bayaran_transportasi_harian' => 0,
                    'total_bayaran_lembur_perjam' => 0,
                    'total_bayaran_penalti' => 0,
                    'total_bayaran' => 0,
                    'tanggal_rekap' => date('Y-m-d H:i:s'),
                ];
            }
            if (!$this->db->get_where('rekap_gaji_karyawan', ['rekap_gaji_bulan' => $data['bulan'], 'rekap_gaji_tahun' => $data['tahun'], 'karyawan_id' => $_POST['rekap']])->row()) {
                $this->db->insert('rekap_gaji_karyawan', $data_rekap);
                $this->session->set_flashdata('msg', 'Berhasil');
            }
        }

        $data['karyawan'] = $this->db->join('posisi', 'posisi.id_posisi = karyawan.posisi_id');
        if ($_SESSION['role_id'] == 2){
            $data['karyawan'] = $data['karyawan']->where('id_karyawan', $_SESSION['karyawan_id']);
        }
        
        $data['karyawan'] = $data['karyawan']->order_by('nama_karyawan')->get('karyawan')->result();
        foreach ($data['karyawan'] as $key => $value) {
            $value->gaji = $this->db->get_where('rekap_gaji_karyawan', ['rekap_gaji_bulan' => $data['bulan'], 'rekap_gaji_tahun' => $data['tahun'], 'karyawan_id' => $value->id_karyawan])->row();
        }

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/content/gaji/index', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function generateGaji($bulan, $tahun, $karyawan_id)
    {
        $jam_masuk = $this->time_setting['jam_masuk'];
        $jam_keluar = $this->time_setting['jam_keluar'];
        $start_lembur = $this->time_setting['start_lembur'];

        return $this->db->query("
        
        SELECT
            id_karyawan as karyawan_id,
            id_posisi as posisi_id,
            '$bulan' as rekap_gaji_bulan,
            '$tahun' as rekap_gaji_tahun,
            total_hari_masuk as total_hari_masuk,
            total_hari_telat as total_hari_telat,
            total_hari_checkout_awal as total_hari_checkout_awal,
            total_jam_lembur as total_jam_lembur,
            bayaran_harian as bayaran_harian,
            bayaran_konsumsi_harian as bayaran_konsumsi_harian,
            bayaran_transportasi_harian as bayaran_transportasi_harian,
            bayaran_lembur_perjam as bayaran_lembur_perjam,
            bayaran_penalti as bayaran_penalti,
            bayaran_penalti as bayaran_penalti,
            total_bayaran_harian as total_bayaran_harian,
            total_bayaran_konsumsi_harian as total_bayaran_konsumsi_harian,
            total_bayaran_transportasi_harian as total_bayaran_transportasi_harian,
            total_bayaran_lembur_perjam as total_bayaran_lembur_perjam,
            total_bayaran_penalti as total_bayaran_penalti,
            total_bayaran as total_bayaran,
            '".date('Y-m-d H:i:s')."' as tanggal_rekap
        FROM
            (
                SELECT 
                    karyawan.id_karyawan,
                    posisi.id_posisi,
                    nama_karyawan,
                    nama_posisi,
                    COUNT(*) as total_hari_masuk,
                    SUM(parameter_telat) as total_hari_telat,
                    SUM(parameter_checkout_awal) as total_hari_checkout_awal,
                    SUM(jumlah_jam_lembur) as total_jam_lembur,
                    --
                    bayaran_harian,
                    bayaran_konsumsi_harian,
                    bayaran_transportasi_harian,
                    bayaran_lembur_perjam,
                    bayaran_penalti,
                    --
                    COUNT(*) * bayaran_harian as total_bayaran_harian,
                    COUNT(*) * bayaran_konsumsi_harian as total_bayaran_konsumsi_harian,
                    COUNT(*) * bayaran_transportasi_harian as total_bayaran_transportasi_harian,
                    SUM(jumlah_jam_lembur) * bayaran_lembur_perjam as total_bayaran_lembur_perjam,
                    (SUM(parameter_telat) + SUM(parameter_checkout_awal)) * bayaran_penalti as total_bayaran_penalti,

                    ((COUNT(*) * bayaran_harian) + (SUM(jumlah_jam_lembur) * bayaran_lembur_perjam) + (COUNT(*) * bayaran_konsumsi_harian) + (COUNT(*) * bayaran_transportasi_harian)) - ((SUM(parameter_telat) + SUM(parameter_checkout_awal)) * bayaran_penalti) as total_bayaran
                    
                FROM (
                
                        SELECT
                            id_karyawan,
                            DATE( A.waktu_checkin ) AS tanggal,
                            MAX(TIME_FORMAT( A.waktu_checkin, '%H:%i:%s' )) AS waktu_checkin,
                            ( SELECT TIME_FORMAT( waktu_checkout, '%H:%i:%s' ) FROM kehadiran WHERE waktu_checkin = MAX( A.waktu_checkin ) LIMIT 1 ) AS waktu_checkout,
                            CASE
                                WHEN MAX(TIME_FORMAT( A.waktu_checkin, '%H:%i:%s' )) > '{$jam_masuk}'
                                THEN 1
                                ELSE 0 
                            END AS parameter_telat,
                            CASE
                                WHEN MAX(TIME_FORMAT( A.waktu_checkout, '%H:%i:%s' )) < '{$jam_keluar}'
                                THEN 1
                                ELSE 0
                            END AS parameter_checkout_awal,
                            CASE WHEN TIME( A.waktu_checkout ) < '{$start_lembur}'
                                THEN 0
                                ELSE TIME_TO_SEC( A.waktu_checkout ) DIV 3600 - TIME_TO_SEC( '{$start_lembur}' ) DIV 3600 
                            END AS jumlah_jam_lembur 
                        FROM
                            kehadiran A
                            JOIN karyawan B ON A.karyawan_id = B.id_karyawan
                        WHERE
                            karyawan_id = $karyawan_id
                            AND MONTH ( A.waktu_checkin ) = $bulan
                            AND YEAR ( A.waktu_checkin ) = $tahun
                        GROUP BY
                            waktu_checkin
                ) tabel_kehadiran
                JOIN karyawan ON karyawan.id_karyawan = tabel_kehadiran.id_karyawan
                JOIN posisi ON posisi.id_posisi = karyawan.posisi_id
        ) new_table
        ")->row_array();

        redirect('GajiController');
    }

    function print($id_rekap_gaji_karyawan)
    {
        
        $data['slip_gaji'] = $this->db->join('karyawan', 'karyawan.id_karyawan = rekap_gaji_karyawan.karyawan_id')->join('posisi', 'posisi.id_posisi = karyawan.posisi_id')->get_where('rekap_gaji_karyawan', ['id_rekap_gaji_karyawan' => $id_rekap_gaji_karyawan])->row();

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/content/gaji/print', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }
}
