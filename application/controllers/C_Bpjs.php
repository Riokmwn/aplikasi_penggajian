<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Bpjs extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');
        $this->load->model('M_Data_Bpjs');
        if (!$this->session->userdata('username')) {
            redirect('C_Auth');
        }
    }

    function data_bpjs()
    {
        $data['judul'] = 'Halaman Data BPJS';
        $data['data_bpjs'] = $this->M_Data_Bpjs->get_all_bpjs();

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/bpjs/v_bpjs', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function add_bpjs()
    {
        $this->form_validation->set_rules('bpjs_kelas', 'Kelas BPJS', 'required|max_length[10]|trim');
        $this->form_validation->set_rules('bpjs_biaya', 'Biaya', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Halaman Data BPJS';
            $data['data_bpjs'] = $this->M_Data_Bpjs->get_all_bpjs();

            $this->load->view('backend/dashboard/templates/header', $data);
            $this->load->view('backend/dashboard/templates/sidebar');
            $this->load->view('backend/bpjs/v_bpjs', $data);
            $this->load->view('backend/dashboard/templates/footer');
        } else {
            // Jika form validation valid, tambahkan data ke database
            $data = array(
                'bpjs_kelas' => $this->input->post('bpjs_kelas'),
                'bpjs_biaya' => (int) preg_replace('/\D/', '', $this->input->post('bpjs_biaya')),
            );

            $this->M_Data_Bpjs->add_bpjs($data);

            // Redirect ke halaman data user setelah berhasil
            redirect('C_Bpjs/data_bpjs');
        }
    }

    function edit_bpjs($id_bpjs)
    {
        $this->form_validation->set_rules('bpjs_kelas', 'Kelas BPJS', 'required|max_length[10]|trim');
        $this->form_validation->set_rules('bpjs_biaya', 'Biaya', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Halaman Data BPJS';
            $data['data_bpjs'] = $this->M_Data_Bpjs->get_bpjs_by_id($id_bpjs);
            $data['id_bpjs'] = $id_bpjs;

            $this->load->view('backend/dashboard/templates/header', $data);
            $this->load->view('backend/dashboard/templates/sidebar');
            $this->load->view('backend/bpjs/v_edit_bpjs', $data);
            $this->load->view('backend/dashboard/templates/footer');
        } else {
            $data = array(
                'bpjs_kelas' => $this->input->post('bpjs_kelas'),
                'bpjs_biaya' => (int) preg_replace('/\D/', '', $this->input->post('bpjs_biaya')),
            );

            // Update data pada database
            $this->db->where('id_bpjs', $id_bpjs);
            $result = $this->db->update('bpjs', $data);

            if ($result) {
                redirect('C_Bpjs/data_bpjs');
            } else {
                // Jika update data gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'Gagal mengubah data');
                redirect('C_Bpjs/edit_bpjs/' . $id_bpjs);
            }
        }
    }

    function delete_bpjs($id_bpjs)
    {
        $this->M_Data_Bpjs->delete_bpjs($id_bpjs);
        redirect('C_Bpjs/data_bpjs');
    }
}
