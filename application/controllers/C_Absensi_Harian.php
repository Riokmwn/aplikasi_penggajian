<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Absensi_Harian extends CI_Controller
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

    function index($karyawan_id, $date)
    {
        if (!$_POST) {

            $data = [];
            $date = explode('-',$date);

            $data['rekap'] = $this->db->where('MONTH(tanggal)', $date[1])->where('YEAR(tanggal)', $date[0])->get('absensi_harian')->result();
            $dates = [];
            $start_date = '01-'.$date[1].'-'.$date[0];
            $start_time = strtotime($start_date);
            $end_time = strtotime('+1 month', $start_time);

            for ($i=$start_time; $i < $end_time; $i+=86400) { 
                $dates[] = array(
                    'day' => date('D', $i),
                    'date' => date('d', $i),
                    'month' => date('M', $i),
                    'year' => date('Y', $i),
                    'week' => date('w', $i),
                    'date_full' => date('Y-m-d', $i)
                );
            }

            $data['tanggal'] = $dates;
            $data['id_karyawan'] = $karyawan_id;

            $this->load->view('backend/dashboard/templates/header', $data);
            $this->load->view('backend/dashboard/templates/sidebar');
            $this->load->view('backend/transaksi/data_gaji/v_absensi_harian', $data);
            $this->load->view('backend/dashboard/templates/footer');
        }else{

            $karyawan = $this->db->get_where('karyawan', ['id_karyawan' => $_POST['id_karyawan']])->row();
            $jabatan = $this->db->get_where('jabatan', ['id_jabatan' => $karyawan->jabatan_id])->row();

            
            
            $iteration = 1;
            foreach ($_POST['data'] as $key => $value) {

                // var_dump($value['masuk'] < '08:00:00');
                // die();

                if ($iteration == 1) {
                    $rekap_data = $this->db->insert('rekap_gaji', [
                        'karyawan_id' => $_POST['id_karyawan'],
                        'rekap_gaji_bulan' => date('Y-m', strtotime($key)),
                        'rekap_gaji_pokok' => 0,
                        'rekap_gaji_makan' => 0,
                        'rekap_gaji_transportasi' => 0,
                        'rekap_gaji_total' => 0,
                    ]);

                    $id_rekap = $this->db->insert_id();
                }

                $this->db->insert('absensi_harian', [
                    'karyawan_id' => $_POST['id_karyawan'],
                    'tanggal' => $key,
                    'jam_masuk' => isset($value['check']) ? $value['masuk'] : '00:00:00',
                    'jam_keluar' => isset($value['check']) ? $value['keluar'] : '00:00:00',
                    'is_masuk' => isset($value['check']) ? 1 : 0
                ]);

                $rekap_gaji = $this->db->get_where('rekap_gaji', ['id' => $id_rekap])->row();

                if (isset($value['check'])) {
                    $this->db->where('id', $id_rekap)->update('rekap_gaji', [
                        'rekap_gaji_pokok' => $rekap_gaji->rekap_gaji_pokok + $jabatan->jabatan_gaji_harian,
                        'rekap_gaji_makan' => $rekap_gaji->rekap_gaji_makan + $jabatan->jabatan_gaji_makan,
                        'rekap_gaji_transportasi' => $rekap_gaji->rekap_gaji_transportasi + $jabatan->jabatan_gaji_transportasi,
                        'rekap_gaji_total' => ($rekap_gaji->rekap_gaji_pokok + $jabatan->jabatan_gaji_harian + $rekap_gaji->rekap_gaji_makan + $jabatan->jabatan_gaji_makan + $rekap_gaji->rekap_gaji_transportasi + $jabatan->jabatan_gaji_transportasi)
                    ]);
                }

                $num++;
            }

            redirect('C_Rekap_Absen/data_rekap_absen');
        }
    }
}
