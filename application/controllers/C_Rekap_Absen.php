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
        if (!$this->session->userdata('username')) {
            redirect('C_Auth');
        }
    }

    function data_rekap_absen()
    {
        $data['judul'] = 'Halaman Rekap Absen';
        $data['rekap_absen'] = $this->M_Rekap_Absen->get_all_rekap_absen();

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/transaksi/rekap_absen/v_rekap_absen', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function add_rekap_absen()
    {
        $this->form_validation->set_rules('bulan', 'Bulan', 'required|trim');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|trim');
        $this->form_validation->set_rules('hadir[]', 'Absen Hadir', 'required|trim');
        $this->form_validation->set_rules('telat[]', 'Absen Telat', 'required|trim');
        $this->form_validation->set_rules('izin[]', 'Absen Izin', 'required|trim');
        $this->form_validation->set_rules('sakit[]', 'Absen Sakit', 'required|trim');
        $this->form_validation->set_rules('tidak_hadir[]', 'Absen Tidak Hadir', 'required|trim');

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

            for ($i = 0; $i < $total_data; $i++) {
                $data = array(

                    'karyawan_id' => isset($this->input->post('id_karyawan')[$i]) ? $this->input->post('id_karyawan')[$i] : '',
                    'rekap_absen_bulan' => isset($bulan) ? $bulan : '',
                    'rekap_absen_tahun' => isset($tahun) ? $tahun : '',
                    'rekap_absen_hadir' => isset($this->input->post('hadir')[$i]) ? $this->input->post('hadir')[$i] : '',
                    'rekap_absen_telat' => isset($this->input->post('telat')[$i]) ? $this->input->post('telat')[$i] : '',
                    'rekap_absen_izin' => isset($this->input->post('izin')[$i]) ? $this->input->post('izin')[$i] : '',
                    'rekap_absen_sakit' => isset($this->input->post('sakit')[$i]) ? $this->input->post('sakit')[$i] : '',
                    'rekap_absen_tidak_hadir' => isset($this->input->post('tidak_hadir')[$i]) ? $this->input->post('tidak_hadir')[$i] : ''
                );
                $array_data[] = $data;
            }

            if ($array_data != '') {
                $this->M_Rekap_Absen->add_rekap_absen($array_data);
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
            // Update data pada database
            $this->db->where('karyawan_id', $id_karyawan);
            $this->db->where('rekap_absen_bulan', $rekap_absen_bulan);
            $this->db->where('rekap_absen_tahun', $rekap_absen_tahun);
            $result = $this->db->update('rekap_absen', $data);

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
        redirect('C_Rekap_Absen/data_rekap_absen');
    }
}