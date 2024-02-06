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
        $data['karyawan'] = $this->db->like('nama_karyawan', $search)->join('users', 'users.karyawan_id = karyawan.id_karyawan')->join('posisi', 'posisi.id_posisi = karyawan.posisi_id')->get('karyawan')->result();

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/content/karyawan/index', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function formPage($method, $id_karyawan = '')
    {
        $data['judul'] = 'Form Karyawan - ' . $method;
        $data['karyawan'] = $this->db->join('users', 'users.karyawan_id = karyawan.id_karyawan')->where('id_karyawan', $id_karyawan)->get('karyawan')->row() ?? new stdClass();
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

                $data_user = array(
                    'users_name' => $this->input->post('nama_karyawan'),
                    'email' => $this->input->post('email'),
                    'username' => strtolower(explode('@', $this->input->post('email'))[0]),
                    'password' => password_hash(123456, PASSWORD_DEFAULT),
                    'role_id' => 2
                );

                if ($method == 'add') {
                    $this->form_validation->set_rules('email', 'email', 'required|trim|is_unique[users.email]');
                    if ($this->form_validation->run() == TRUE) {
                        $this->db->insert('karyawan', $data);
                        $data_user['karyawan_id'] = $this->db->insert_id();
                        $this->db->insert('users', $data_user);
                    }
                }else if ($method == 'edit') {
                    $this->db->where('id_karyawan', $id_karyawan)->update('karyawan', $data);
                    $this->db->where('karyawan_id', $id_karyawan)->update('users', $data_user);
                }
                $this->session->set_flashdata('msg', 'Berhasil');
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
        $this->db->where('karyawan_id', $id_karyawan)->delete('users');
        $this->session->set_flashdata('msg', 'Berhasil');
        redirect('KaryawanController');
    }
}
