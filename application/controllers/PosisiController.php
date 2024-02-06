<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PosisiController extends CI_Controller
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
        $search = $this->input->get('search') ?? '';
        $data['judul'] = 'Posisi';
        $data['posisi'] = $this->db->like('nama_posisi', $search)->get('posisi')->result();

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/content/posisi/index', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function formPage($method, $id_posisi = '')
    {
        $data['judul'] = 'Form Posisi - ' . $method;
        $data['posisi'] = $this->db->where('id_posisi', $id_posisi)->get('posisi')->row() ?? new stdClass();
        $data['method'] = $method;

        if ($_POST) {
            $this->form_validation->set_rules('nama_posisi', 'nama_posisi', 'required|trim');
            $this->form_validation->set_rules('bayaran_harian', 'bayaran_harian', 'required|trim');
            $this->form_validation->set_rules('bayaran_konsumsi_harian', 'bayaran_konsumsi_harian', 'required|trim');
            $this->form_validation->set_rules('bayaran_transportasi_harian', 'bayaran_transportasi_harian', 'required|trim');
            $this->form_validation->set_rules('bayaran_lembur_perjam', 'bayaran_lembur_perjam', 'required|trim');
            $this->form_validation->set_rules('bayaran_penalti', 'bayaran_penalti', 'required|trim');

            if ($this->form_validation->run() == TRUE) {
                
                $data = array(
                    'nama_posisi' => $this->input->post('nama_posisi'),
                    'bayaran_harian' => (int) preg_replace('/\D/', '', $this->input->post('bayaran_harian')),
                    'bayaran_konsumsi_harian' => (int) preg_replace('/\D/', '', $this->input->post('bayaran_konsumsi_harian')),
                    'bayaran_transportasi_harian' => (int) preg_replace('/\D/', '', $this->input->post('bayaran_transportasi_harian')),
                    'bayaran_lembur_perjam' => (int) preg_replace('/\D/', '', $this->input->post('bayaran_lembur_perjam')),
                    'bayaran_penalti' => (int) preg_replace('/\D/', '', $this->input->post('bayaran_penalti'))
                );

                if ($method == 'add') {
                    $this->db->insert('posisi', $data);
                }else if ($method == 'edit') {
                    $this->db->where('id_posisi', $id_posisi)->update('posisi', $data);
                }
                $this->session->set_flashdata('msg', 'Berhasil');
                redirect('PosisiController');
            }
        }

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/content/posisi/form', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function delete($id_posisi)
    {
        $this->db->where('id_posisi', $id_posisi)->delete('posisi');
        $this->session->set_flashdata('msg', 'Berhasil');
        redirect('PosisiController');
    }
}
