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
    }

    function index()
    {
        
        $data['judul'] = 'Pembayaran Gaji';
        $data['bulan'] = $_POST['bulan'] ?? date('m');
        $data['tahun'] = $_POST['tahun'] ?? date('Y');
        $data['karyawan_id'] = $_POST['karyawan_id'] ?? 0;
        $bln = $data['bulan'];
        $thn = $data['tahun'];
        $karyawan_all = $this->db->query("SELECT DISTINCT karyawan_id  as karyawan_id FROM rekap_gaji_karyawan WHERE rekap_gaji_bulan = '$bln' AND rekap_gaji_tahun = '$thn' ")->result_array();
        $karyawan_all = array_column($karyawan_all, 'karyawan_id');
        if (count($karyawan_all) == 0) {
            $karyawan_all = [0];
        }
        $data['karyawan'] = $this->db->where_not_in('id_karyawan', $karyawan_all)->get('karyawan')->result();
        $data['gajian'] = $this->db->join('karyawan', 'karyawan.id_karyawan = rekap_gaji_karyawan.karyawan_id')->join('posisi', 'posisi.id_posisi = rekap_gaji_karyawan.posisi_id')->get_where('rekap_gaji_karyawan', ['rekap_gaji_bulan' => $data['bulan'], 'rekap_gaji_tahun' => $data['tahun']])->result();

        if ($_POST && $_POST['karyawan_id'] != '') {
            $gajian = $this->generateGaji($data['bulan'], $data['tahun'], $data['karyawan_id']);
            $check = $this->db->get_where('rekap_gaji_karyawan', ['rekap_gaji_bulan' => $gajian['rekap_gaji_bulan'], 'rekap_gaji_tahun' => $gajian['rekap_gaji_tahun'], 'karyawan_id' => $data['karyawan_id']])->row();
            if (!$check) {
                $this->db->insert('rekap_gaji_karyawan', $gajian);
            }
        }

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/content/gaji/index', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function generateGaji($bulan, $tahun, $karyawan_id)
    {
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
                                WHEN MAX(TIME_FORMAT( A.waktu_checkin, '%H:%i:%s' )) > '08:10:00'
                                THEN 1
                                ELSE 0 
                            END AS parameter_telat,
                            CASE
                                WHEN MAX(TIME_FORMAT( A.waktu_checkout, '%H:%i:%s' )) < '17:00:00'
                                THEN 1
                                ELSE 0
                            END AS parameter_checkout_awal,
                            CASE WHEN TIME( A.waktu_checkout ) < '18:00:00'
                                THEN 0
                                ELSE TIME_TO_SEC( A.waktu_checkout ) DIV 3600 - TIME_TO_SEC( '18:00:00' ) DIV 3600 
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
}
