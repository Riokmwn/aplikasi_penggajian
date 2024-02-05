<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KaryawanController extends CI_Controller
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
        $data['judul'] = 'Karyawan';
        $data['karyawan'] = $this->db->like('nama_karyawan', $search)->join('posisi', 'posisi.id_posisi = karyawan.posisi_id')->get('karyawan')->result();

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/content/karyawan/index', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function formPage($method, $id_karyawan = '')
    {
        $data['judul'] = 'Form Karyawan - ' . $method;
        $data['karyawan'] = $this->db->where('id_karyawan', $id_karyawan)->get('karyawan')->row() ?? new stdClass();
        $data['posisi'] = $this->db->get('posisi')->result();
        $data['method'] = $method;

        if ($_POST) {
            $this->form_validation->set_rules('nama_karyawan', 'nama_karyawan', 'required|trim');
            $this->form_validation->set_rules('posisi_id', 'posisi_id', 'required|trim');

            if ($this->form_validation->run() == TRUE) {
                
                $data = array(
                    'nama_karyawan' => $this->input->post('nama_karyawan'),
                    'posisi_id' => $this->input->post('posisi_id'),
                );

                if ($method == 'add') {
                    $this->db->insert('karyawan', $data);
                }else if ($method == 'edit') {
                    $this->db->where('id_karyawan', $id_karyawan)->update('karyawan', $data);
                }
                
                redirect('KaryawanController');
            }
        }

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/content/karyawan/form', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function delete($id_karyawan)
    {
        $this->db->where('id_karyawan', $id_karyawan)->delete('karyawan');
        redirect('KaryawanController');
    }
}
