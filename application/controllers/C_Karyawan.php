<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Karyawan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Karyawan');
        $this->load->model('M_Jenis_Kelamin');
        $this->load->model('M_Jabatan');
        $this->load->model('M_Status_Karyawan');

        if (!$this->session->userdata('username')) {
            redirect('C_Auth');
        }
    }

    function data_karyawan()
    {
        $search = $this->input->get('search');
        if ($search) {
            $data['judul'] = 'Halaman Data Karyawan';
            $data['search'] = $search;
            $data['karyawan'] = $this->M_Karyawan->search_nik_name_karyawan($search);
            $data['jenis_kelamin'] = $this->M_Jenis_Kelamin->get_jenis_kelamin();
            $data['jabatan'] = $this->M_Jabatan->get_jabatan();
            $data['status_karyawan'] = $this->M_Status_Karyawan->get_status_karyawan();
        } else {
            $data['judul'] = 'Halaman Data Karyawan';
            $data['karyawan'] = $this->M_Karyawan->get_all_karyawan();
            $data['jenis_kelamin'] = $this->M_Jenis_Kelamin->get_jenis_kelamin();
            $data['jabatan'] = $this->M_Jabatan->get_jabatan();
            $data['status_karyawan'] = $this->M_Status_Karyawan->get_status_karyawan();
        }

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/master/karyawan/v_data_karyawan', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function add_karyawan()
    {
        $this->form_validation->set_rules('nik_karyawan', 'NIK Karyawan', 'required|is_unique[karyawan.nik_karyawan]|numeric|trim|min_length[16]');
        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required|trim');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('jabatan_karyawan', 'Jabatan Karyawan', 'required|trim');
        $this->form_validation->set_rules('status_karyawan', 'Status Karyawan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Halaman Data Karyawan';
            $data['karyawan'] = $this->M_Karyawan->get_all_karyawan();
            $data['jenis_kelamin'] = $this->M_Jenis_Kelamin->get_jenis_kelamin();
            $data['jabatan'] = $this->M_Jabatan->get_jabatan();
            $data['status_karyawan'] = $this->M_Status_Karyawan->get_status_karyawan();

            $this->load->view('backend/dashboard/templates/header', $data);
            $this->load->view('backend/dashboard/templates/sidebar');
            $this->load->view('backend/master/karyawan/v_data_karyawan', $data);
            $this->load->view('backend/dashboard/templates/footer');
        } else {
            // Jika form validation valid, tambahkan data ke database
            $data = array(
                'nik_karyawan' => $this->input->post('nik_karyawan'),
                'karyawan_nama' => $this->input->post('nama_karyawan'),
                'karyawan_tanggal_masuk' => $this->input->post('tanggal_masuk'),
                'jenis_kelamin_id' => $this->input->post('jenis_kelamin'),
                'jabatan_id' => $this->input->post('jabatan_karyawan'),
                'status_karyawan_id' => $this->input->post('status_karyawan')
            );
            $this->M_Karyawan->add_karyawan($data);

            // Redirect ke halaman data user setelah berhasil
            redirect('C_Karyawan/data_karyawan');
        }
    }

    function edit_karyawan($id_karyawan)
    {
        $existing_nik = $this->M_Karyawan->get_nik_karyawan_by_id($id_karyawan);
        $nik_rule = 'required|numeric|trim|min_length[16]';
        if (isset($_POST['nik_karyawan']) && $_POST['nik_karyawan'] != $existing_nik) {
            // Nik berubah, terapkan validasi is_unique
            $nik_rule .= '|is_unique[karyawan.nik_karyawan]';
        }

        $this->form_validation->set_rules('nik_karyawan', 'NIK Karyawan', $nik_rule);
        $this->form_validation->set_rules('nama_karyawan', 'Nama Karyawan', 'required|trim');
        $this->form_validation->set_rules('tanggal_masuk', 'Tanggal Masuk', 'required|trim');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
        $this->form_validation->set_rules('jabatan_karyawan', 'Jabatan Karyawan', 'required|trim');
        $this->form_validation->set_rules('status_karyawan', 'Status Karyawan', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Halaman Ubah Karyawan';
            $data['karyawan'] = $this->M_Karyawan->get_karyawan_by_id($id_karyawan);
            $data['jenis_kelamin'] = $this->M_Jenis_Kelamin->get_jenis_kelamin();
            $data['jabatan'] = $this->M_Jabatan->get_jabatan();
            $data['status_karyawan'] = $this->M_Status_Karyawan->get_status_karyawan();
            $data['id_karyawan'] = $id_karyawan;

            $this->load->view('backend/dashboard/templates/header', $data);
            $this->load->view('backend/dashboard/templates/sidebar');
            $this->load->view('backend/master/karyawan/v_edit_karyawan', $data);
            $this->load->view('backend/dashboard/templates/footer');
        } else {
            $data = array(
                'nik_karyawan' => $this->input->post('nik_karyawan'),
                'karyawan_nama' => $this->input->post('nama_karyawan'),
                'karyawan_tanggal_masuk' => $this->input->post('tanggal_masuk'),
                'jenis_kelamin_id' => $this->input->post('jenis_kelamin'),
                'jabatan_id' => $this->input->post('jabatan_karyawan'),
                'status_karyawan_id' => $this->input->post('status_karyawan')
            );

            // Update data pada database
            $this->db->where('id_karyawan', $id_karyawan);
            $result = $this->db->update('karyawan', $data);

            if ($result) {
                redirect('C_Karyawan/data_karyawan');
            } else {
                // Jika update data gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'Gagal mengubah data');
                redirect('C_Karyawan/edit_karyawan/' . $id_karyawan);
            }
        }
    }

    function delete_karyawan($id_karyawan)
    {
        $this->M_Karyawan->delete_karyawan($id_karyawan);
        redirect('C_Karyawan/data_karyawan');
    }
}
