<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Master extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User_Model');
        $this->load->model('M_Karyawan_Model');
        if (!$this->session->userdata('username')) {
            redirect('C_Auth');
        }
    }

    function data_user()
    {
        $data['judul'] = 'Halaman Data User';
        $data['users'] = $this->M_User_Model->get_akun_karyawan();

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/master/user/v_data_user', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function add_user()
    {
        $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');

        if ($this->form_validation->run() == FALSE) {
            // Jika form validation tidak valid, tampilkan kembali form tambah user
            $this->load->view('backend/dashboard/templates/header', $data);
            $this->load->view('backend/dashboard/templates/sidebar');
            $this->load->view('backend/master/user/v_data_user', $data);
            $this->load->view('backend/dashboard/templates/footer');
        } else {
            // Jika form validation valid, tambahkan data ke database
            $data = array(
                'users_name' => $this->input->post('nama_pengguna'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('username'), PASSWORD_DEFAULT),
                'role_id' => 2
            );
            $this->M_User_Model->add_user($data);

            // Redirect ke halaman data user setelah berhasil
            redirect('C_Master/data_user');
        }
    }

    function edit_user($id_users)
    {
        $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Halaman Ubah User';
            $data['user'] = $this->M_User_Model->get_user_by_id($id_users); // ambil data pengguna dari model
            $data['id_users'] = $id_users;

            $this->load->view('backend/dashboard/templates/header', $data);
            $this->load->view('backend/dashboard/templates/sidebar');
            $this->load->view('backend/master/user/v_edit_user', $data);
            $this->load->view('backend/dashboard/templates/footer');
        } else {
            $data = array(
                'users_name' => $this->input->post('nama_pengguna'),
                'username' => $this->input->post('username')
            );

            // Update data pada database
            $this->db->where('id_users', $id_users);
            $result = $this->db->update('users', $data);

            if ($result) {
                redirect('C_Master/data_user');
            } else {
                // Jika update data gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'Gagal mengubah data');
                redirect('C_Master/edit_user/' . $id_users);
            }
        }
    }

    function delete_users($id_users)
    {
        $this->M_User_Model->delete_users($id_users);
        // redirect('C_Master/data_user');
        echo json_encode(['status' => true]);
    }


    function data_karyawan()
    {
        $data['judul'] = 'Halaman Data Karyawan';
        $data['karyawan'] = $this->M_Karyawan_Model->get_all_karyawan();

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/master/v_data_karyawan');
        $this->load->view('backend/dashboard/templates/footer');
    }

    function add_karyawan()
    {
        $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');

        if ($this->form_validation->run() == FALSE) {
            // Jika form validation tidak valid, tampilkan kembali form tambah user
            $data['judul'] = 'Halaman Data Karyawan';
            $data['karyawan'] = $this->M_Karyawan_Model->get_all_karyawan();

            $this->load->view('backend/dashboard/templates/header', $data);
            $this->load->view('backend/dashboard/templates/sidebar');
            $this->load->view('backend/master/v_data_karyawan');
            $this->load->view('backend/dashboard/templates/footer');
        } else {
            // Jika form validation valid, tambahkan data ke database
            $data = array(
                'users_name' => $this->input->post('nama_pengguna'),
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('username'), PASSWORD_DEFAULT),
                'role_id' => 2
            );
            $this->M_Karyawan_Model->add_karyawan($data);

            // Redirect ke halaman data user setelah berhasil
            redirect('C_Master/data_karyawan');
        }
    }

    function data_jabatan()
    {
        $data['judul'] = 'Halaman Data Jabatan';
        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/master/v_data_jabatan');
        $this->load->view('backend/dashboard/templates/footer');
    }
}
