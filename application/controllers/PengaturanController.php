<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengaturanController extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');

        if (!$this->session->userdata('username')) {
            redirect('C_Auth');
        }
    }

    function index()
    {
        $data['judul'] = 'Pengaturan';
        $data['pengaturan'] = $this->db->get('pengaturan')->result();

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/content/pengaturan/index', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function formPage($method, $id_pengaturan = 1)
    {
        $data['judul'] = 'Form Pengaturan - ' . $method;
        $data['pengaturan'] = $this->db->where('id_pengaturan', $id_pengaturan)->get('pengaturan')->row() ?? new stdClass();
        $data['method'] = $method;

        if ($_POST) {
            $this->form_validation->set_rules('jam_masuk', 'jam_masuk', 'required|trim');
            $this->form_validation->set_rules('menit_masuk_toleransi', 'menit_masuk_toleransi', 'required|trim');
            $this->form_validation->set_rules('jam_keluar', 'jam_keluar', 'required|trim');

            if ($this->form_validation->run() == TRUE) {
                
                $data = array(
                    'jam_masuk' => $this->input->post('jam_masuk'),
                    'menit_masuk_toleransi' => $this->input->post('menit_masuk_toleransi'),
                    'jam_keluar' => $this->input->post('jam_keluar'),
                );
                $this->db->where('id_pengaturan', 1)->update('pengaturan', $data);
                
                redirect('PengaturanController');
            }
        }

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/content/pengaturan/form', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function delete($id_pengaturan)
    {
        $this->db->where('id_pengaturan', $id_pengaturan)->delete('pengaturan');
        redirect('PengaturanController');
    }
}
