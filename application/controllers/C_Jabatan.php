<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Jabatan extends CI_Controller
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

    function data_jabatan()
    {
        $search = $this->input->get('search');
        if ($search) {
            $data['judul'] = 'Halaman Data Jabatan';
            $data['search'] = $search;
            $data['jabatan'] = $this->M_Jabatan->search_jabatan($search);
        } else {
            $data['judul'] = 'Halaman Data Jabatan';
            $data['jabatan'] = $this->M_Jabatan->get_jabatan();
        }


        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/master/jabatan/v_data_jabatan', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function add_jabatan()
    {
        $this->form_validation->set_rules('jabatan_nama', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('gaji_harian', 'Gaji Pokok', 'required|trim');
        $this->form_validation->set_rules('uang_makan', 'Uang Masuk', 'required|trim');
        $this->form_validation->set_rules('transportasi', 'Transportasi', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Halaman Data Jabatan';
            $data['jabatan'] = $this->M_Jabatan->get_jabatan();

            $this->load->view('backend/dashboard/templates/header', $data);
            $this->load->view('backend/dashboard/templates/sidebar');
            $this->load->view('backend/master/jabatan/v_data_jabatan', $data);
            $this->load->view('backend/dashboard/templates/footer');
        } else {
            // Jika form validation valid, tambahkan data ke database
            $data = array(
                'jabatan_nama' => $this->input->post('jabatan_nama'),
                'jabatan_gaji_harian' => (int) preg_replace('/\D/', '', $this->input->post('gaji_harian')),
                'jabatan_gaji_makan' => (int) preg_replace('/\D/', '', $this->input->post('uang_makan')),
                'jabatan_gaji_transportasi' => (int) preg_replace('/\D/', '', $this->input->post('transportasi'))
            );

            $this->M_Jabatan->add_jabatan($data);

            // Redirect ke halaman data user setelah berhasil
            redirect('C_Jabatan/data_jabatan');
        }
    }

    function edit_jabatan($id_jabatan)
    {
        $this->form_validation->set_rules('jabatan_nama', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('gaji_harian', 'Gaji Pokok', 'required|trim');
        $this->form_validation->set_rules('uang_makan', 'Uang Masuk', 'required|trim');
        $this->form_validation->set_rules('transportasi', 'Transportasi', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Halaman Ubah Jabatan';
            $data['jabatan'] = $this->M_Jabatan->get_jabatan_by_id($id_jabatan);
            $data['id_jabatan'] = $id_jabatan;

            $this->load->view('backend/dashboard/templates/header', $data);
            $this->load->view('backend/dashboard/templates/sidebar');
            $this->load->view('backend/master/jabatan/v_edit_jabatan', $data);
            $this->load->view('backend/dashboard/templates/footer');
        } else {
            $data = array(
                'jabatan_nama' => $this->input->post('jabatan_nama'),
                'jabatan_gaji_harian' => (int) preg_replace('/\D/', '', $this->input->post('gaji_harian')),
                'jabatan_gaji_makan' => (int) preg_replace('/\D/', '', $this->input->post('uang_makan')),
                'jabatan_gaji_transportasi' => (int) preg_replace('/\D/', '', $this->input->post('transportasi'))
            );

            // Update data pada database
            $this->db->where('id_jabatan', $id_jabatan);
            $result = $this->db->update('jabatan', $data);

            if ($result) {
                redirect('C_Jabatan/data_jabatan');
            } else {
                // Jika update data gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'Gagal mengubah data');
                redirect('C_Jabatan/edit_jabatan/' . $id_jabatan);
            }
        }
    }

    function delete_jabatan($id_jabatan)
    {
        $this->M_Jabatan->delete_jabatan($id_jabatan);
        redirect('C_Jabatan/data_jabatan');
    }
}
