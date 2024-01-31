<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Rekap_Absen extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Rekap_Absen');
        $this->load->model('M_Karyawan');
        $this->load->model('M_Jabatan');
        $this->load->model('M_Data_Gaji');
        if (!$this->session->userdata('username')) {
            redirect('C_Auth');
        }
    }

    function data_rekap_absen()
    {
        $selectedMonth = $this->input->get('bulan') ?? '';
        $selectedYear = $this->input->get('tahun') ?? '';
        $search = $this->input->get('search') ?? '';

        if (!empty($selectedMonth) && !empty($selectedYear)) {
            $data['judul'] = 'Halaman Rekap Absen';
            $data['rekap_absen'] = $this->M_Rekap_Absen->get_rekap_absen_by_month_year($selectedMonth, $selectedYear);
        } else if ($search) {
            $data['judul'] = 'Halaman Rekap Absen';
            $data['search'] = $search;
            $data['rekap_absen'] = $this->M_Rekap_Absen->search_rekap_absen($search);
        } else {
            $data['judul'] = 'Halaman Rekap Absen';
            $data['rekap_absen'] = $this->M_Rekap_Absen->get_all_rekap_absen();
        }

        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('jenis_kelamin', 'karyawan.jenis_kelamin_id = jenis_kelamin.id_jenis_kelamin');
        $this->db->join('jabatan', 'karyawan.jabatan_id = jabatan.id_jabatan');
        $this->db->join('status_karyawan', 'karyawan.status_karyawan_id = status_karyawan.id_status_karyawan');
        $this->db->join('rekap_absen', 'karyawan.id_karyawan = rekap_absen.karyawan_id');
        if ($_SESSION['role_id'] == 2) {
            $this->db->where('karyawan.user_id', $_SESSION['id_users']);
        }
        $this->db->like('rekap_absen_bulan', $selectedMonth);
        $this->db->like('rekap_absen_tahun', $selectedYear);
        $this->db->like('nik_karyawan', $search);
        $this->db->like('karyawan_nama', $search);
        $data['rekap_absen'] = $this->db->get()->result();

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/transaksi/rekap_absen/v_rekap_absen', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function add_rekap_absen()
    {
        $this->form_validation->set_rules('bulan', 'Bulan', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Halaman Tambah Rekap Absen';
            $data['rekap_karyawan'] = $this->M_Karyawan->get_all_karyawan();

            $this->load->view('backend/dashboard/templates/header', $data);
            $this->load->view('backend/dashboard/templates/sidebar');
            $this->load->view('backend/transaksi/rekap_absen/v_add_rekap_absen', $data);
            $this->load->view('backend/dashboard/templates/footer');
        } else {
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $total_data = count($this->input->post('hadir'));

            $array_data = array(); // Buat array kosong untuk menampung data rekap absen
            $array_gaji = array(); // Buat array kosong untuk menampung data rekap gaji

            for ($i = 0; $i < $total_data; $i++) {
                if ($this->input->post('hadir')[$i] > 0) {
                    $data = array(
                        'karyawan_id' => isset($this->input->post('id_karyawan')[$i]) ? $this->input->post('id_karyawan')[$i] : '',
                        'rekap_absen_bulan' => isset($bulan) ? $bulan : '',
                        'rekap_absen_tahun' => isset($tahun) ? $tahun : '',
                        'rekap_absen_hadir' => isset($this->input->post('hadir')[$i]) ? intval($this->input->post('hadir')[$i]) : 0,
                        'rekap_absen_telat' => isset($this->input->post('telat')[$i]) ? intval($this->input->post('telat')[$i]) : 0,
                        'rekap_absen_izin' => isset($this->input->post('izin')[$i]) ? intval($this->input->post('izin')[$i]) : 0,
                        'rekap_absen_sakit' => isset($this->input->post('sakit')[$i]) ? intval($this->input->post('sakit')[$i]) : 0,
                        'rekap_absen_tidak_hadir' => isset($this->input->post('tidak_hadir')[$i]) ? intval($this->input->post('tidak_hadir')[$i]) : 0
                    );

                    $jabatan_gaji = $this->M_Jabatan->get_jabatan_gaji($this->input->post('id_karyawan')[$i]);
                    $jabatan_gaji_pokok = $jabatan_gaji['jabatan_gaji_pokok'];
                    $jabatan_gaji_makan = $jabatan_gaji['jabatan_gaji_makan'];
                    $jabatan_gaji_transportasi = $jabatan_gaji['jabatan_gaji_transportasi'];
                    $rekap_gaji_total = 0;

                    $rekap_gaji_pokok = isset($this->input->post('hadir')[$i]) ? $this->input->post('hadir')[$i] * ($jabatan_gaji_pokok / 20) : 0;
                    $rekap_gaji_makan = isset($this->input->post('hadir')[$i]) ? $this->input->post('hadir')[$i] * ($jabatan_gaji_makan / 20) : 0;
                    $rekap_gaji_transportasi = isset($this->input->post('hadir')[$i]) ? $this->input->post('hadir')[$i] * ($jabatan_gaji_transportasi / 20) : 0;
                    // $rekap_gaji_potongan = isset($this->input->post('tidak_hadir')[$i]) ? ($this->input->post('tidak_hadir')[$i] * ($rekap_gaji_pokok / 20)) + (isset($this->input->post('telat')[$i]) ? ($this->input->post('telat')[$i] * ($jabatan_gaji_makan / 20 + $jabatan_gaji_transportasi / 20)) : 0) : 0;
                    $rekap_gaji_potongan = isset($this->input->post('tidak_hadir')[$i]) ? ($this->input->post('tidak_hadir')[$i] * ($jabatan_gaji_pokok / 20)) + (isset($this->input->post('telat')[$i]) ? ($this->input->post('telat')[$i] * ($jabatan_gaji_makan / 20 + $jabatan_gaji_transportasi / 20)) : 0) : 0;
                    // var_dump(($this->input->post('tidak_hadir')[$i] * ($jabatan_gaji_pokok / 20)));
                    // die();
                    $rekap_gaji_tidak_masuk = isset($this->input->post('tidak_hadir')[$i]) ? ($this->input->post('tidak_hadir')[$i] * ($rekap_gaji_pokok / 20)) : 0;
                    $rekap_gaji_telat_makan = isset($this->input->post('telat')[$i]) ? ($this->input->post('telat')[$i] * ($jabatan_gaji_makan / 20)) : 0;
                    $rekap_gaji_telat_transportasi = isset($this->input->post('telat')[$i]) ? ($this->input->post('telat')[$i] * ($jabatan_gaji_transportasi / 20)) : 0;
                    $rekap_gaji_total += isset($this->input->post('hadir')[$i]) ? (($rekap_gaji_pokok + $rekap_gaji_makan + $rekap_gaji_transportasi) - ($rekap_gaji_tidak_masuk + $rekap_gaji_telat_makan + $rekap_gaji_telat_transportasi)) : 0;

                    $data2 = array(
                        'karyawan_id' => isset($this->input->post('id_karyawan')[$i]) ? $this->input->post('id_karyawan')[$i] : '',
                        'rekap_gaji_bulan' => isset($bulan) ? $bulan : '',
                        'rekap_gaji_tahun' => isset($tahun) ? $tahun : '',
                        // 'rekap_gaji_pokok' => intval($rekap_gaji_pokok),
                        // 'rekap_gaji_makan' => intval($rekap_gaji_makan),
                        // 'rekap_gaji_transportasi' => intval($rekap_gaji_transportasi),
                        // 'rekap_gaji_potongan' => intval($rekap_gaji_potongan),
                        // 'rekap_gaji_total' => intval($rekap_gaji_total)
                        'rekap_gaji_pokok' => isset($rekap_gaji_pokok) ? (int) preg_replace('/\D/', '', $rekap_gaji_pokok) : 0,
                        'rekap_gaji_makan' => isset($rekap_gaji_makan) ? (int) preg_replace('/\D/', '', $rekap_gaji_makan) : 0,
                        'rekap_gaji_transportasi' => isset($rekap_gaji_transportasi) ? (int) preg_replace('/\D/', '', $rekap_gaji_transportasi) : 0,
                        'rekap_gaji_potongan' => isset($rekap_gaji_potongan) ? (int) preg_replace('/\D/', '', $rekap_gaji_potongan) : 0,
                        'rekap_gaji_total' => isset($rekap_gaji_total) ? (int) preg_replace('/\D/', '', $rekap_gaji_total) : 0
                    );

                    $array_data[] = $data;
                    $array_gaji[] = $data2;
                }
            }

            if (!empty($array_data) && !empty($array_gaji)) {
                $this->M_Rekap_Absen->add_rekap_absen($array_data);
                $this->M_Data_Gaji->add_rekap_gaji($array_gaji);
            }

            redirect('C_Rekap_Absen/data_rekap_absen');
        }
    }

    function edit_rekap_absen($id_karyawan, $rekap_absen_bulan, $rekap_absen_tahun)
    {
        $this->form_validation->set_rules('hadir', 'Absen Hadir', 'required|trim');
        $this->form_validation->set_rules('telat', 'Absen Telat', 'required|trim');
        $this->form_validation->set_rules('izin', 'Absen Izin', 'required|trim');
        $this->form_validation->set_rules('sakit', 'Absen Sakit', 'required|trim');
        $this->form_validation->set_rules('tidak_hadir', 'Absen Tidak Hadir', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Halaman Tambah Rekap Absen';
            $data['rekap_absen'] = $this->M_Rekap_Absen->get_rekap_absen_by_id_bulan_tahun($id_karyawan, $rekap_absen_bulan, $rekap_absen_tahun);
            $data['id_karyawan'] = $id_karyawan;
            $data['rekap_absen_bulan'] = $rekap_absen_bulan;
            $data['rekap_absen_tahun'] = $rekap_absen_tahun;

            $this->load->view('backend/dashboard/templates/header', $data);
            $this->load->view('backend/dashboard/templates/sidebar');
            $this->load->view('backend/transaksi/rekap_absen/v_edit_rekap_absen', $data);
            $this->load->view('backend/dashboard/templates/footer');
        } else {
            $data = array(
                'rekap_absen_hadir' => $this->input->post('hadir'),
                'rekap_absen_telat' => $this->input->post('telat'),
                'rekap_absen_izin' => $this->input->post('izin'),
                'rekap_absen_sakit' => $this->input->post('sakit'),
                'rekap_absen_tidak_hadir' => $this->input->post('tidak_hadir')
            );

            $jabatan_gaji = $this->M_Jabatan->get_jabatan_gaji($this->input->post('id_karyawan'));
            $jabatan_gaji_pokok = $jabatan_gaji['jabatan_gaji_pokok'];
            $jabatan_gaji_makan = $jabatan_gaji['jabatan_gaji_makan'];
            $jabatan_gaji_transportasi = $jabatan_gaji['jabatan_gaji_transportasi'];
            $rekap_gaji_total = 0;

            $rekap_gaji_pokok = ($this->input->post('hadir')) ? $this->input->post('hadir') * ($jabatan_gaji_pokok / 20) : 0;
            $rekap_gaji_makan = ($this->input->post('hadir')) ? $this->input->post('hadir') * ($jabatan_gaji_makan / 20) : 0;
            $rekap_gaji_transportasi = ($this->input->post('hadir')) ? $this->input->post('hadir') * ($jabatan_gaji_transportasi / 20) : 0;
            $rekap_gaji_potongan = ($this->input->post('tidak_hadir')) ? ($this->input->post('tidak_hadir') * ($rekap_gaji_total / 20)) + (($this->input->post('telat')) ? ($this->input->post('telat') * ($jabatan_gaji_makan / 20 + $jabatan_gaji_transportasi / 20)) : 0) : 0;
            $rekap_gaji_total += ($this->input->post('hadir')) ? (($rekap_gaji_pokok + $rekap_gaji_makan + $rekap_gaji_transportasi) - $rekap_gaji_potongan) : 0;

            $data2 = array(
                // 'rekap_gaji_pokok' => intval($rekap_gaji_pokok),
                // 'rekap_gaji_makan' => intval($rekap_gaji_makan),
                // 'rekap_gaji_transportasi' => intval($rekap_gaji_transportasi),
                // 'rekap_gaji_potongan' => intval($rekap_gaji_potongan),
                // 'rekap_gaji_total' => intval($rekap_gaji_total)
                'rekap_gaji_pokok' => isset($rekap_gaji_pokok) ? (int) preg_replace('/\D/', '', $rekap_gaji_pokok) : 0,
                'rekap_gaji_makan' => isset($rekap_gaji_makan) ? (int) preg_replace('/\D/', '', $rekap_gaji_makan) : 0,
                'rekap_gaji_transportasi' => isset($rekap_gaji_transportasi) ? (int) preg_replace('/\D/', '', $rekap_gaji_transportasi) : 0,
                'rekap_gaji_potongan' => isset($rekap_gaji_potongan) ? (int) preg_replace('/\D/', '', $rekap_gaji_potongan) : 0,
                'rekap_gaji_total' => isset($rekap_gaji_total) ? (int) preg_replace('/\D/', '', $rekap_gaji_total) : 0
            );

            // Update data pada database
            $this->db->where('karyawan_id', $id_karyawan);
            $this->db->where('rekap_absen_bulan', $rekap_absen_bulan);
            $this->db->where('rekap_absen_tahun', $rekap_absen_tahun);
            $result = $this->db->update('rekap_absen', $data);


            $this->db->where('karyawan_id', $id_karyawan);
            $this->db->where('rekap_gaji_bulan', $rekap_absen_bulan);
            $this->db->where('rekap_gaji_tahun', $rekap_absen_tahun);
            $result = $this->db->update('rekap_gaji', $data2);

            if ($result) {
                redirect('C_Rekap_Absen/data_rekap_absen');
            } else {
                // Jika update data gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'Gagal mengubah data');
                redirect('C_Rekap_Absen/edit_rekap_absen/' . $id_karyawan . $rekap_absen_bulan . $rekap_absen_tahun);
            }
            redirect('C_Rekap_Absen/data_rekap_absen');
        }
    }

    function delete_rekap_absen($id_karyawan, $rekap_absen_bulan, $rekap_absen_tahun)
    {
        $this->M_Rekap_Absen->delete_rekap_absen($id_karyawan, $rekap_absen_bulan, $rekap_absen_tahun);
        $this->M_Data_Gaji->delete_rekap_gaji($id_karyawan, $rekap_absen_bulan, $rekap_absen_tahun);
        redirect('C_Rekap_Absen/data_rekap_absen');
    }
}
