<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_User');

        if (!$this->session->userdata('username')) {
            redirect('C_Auth');
        }
    }

    function data_user()
    {
        $search = $this->input->get('search');
        if ($search) {
            $data['judul'] = 'Halaman Data User';
            $data['search'] = $search;
            $data['users'] = $this->M_User->search_user_karyawan($search);
        } else {
            $data['judul'] = 'Halaman Data User';
            $data['users'] = $this->M_User->get_akun_karyawan();
        }

        $this->load->view('backend/dashboard/templates/header', $data);
        $this->load->view('backend/dashboard/templates/sidebar');
        $this->load->view('backend/master/user/v_data_user', $data);
        $this->load->view('backend/dashboard/templates/footer');
    }

    function add_user()
    {
        $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Halaman Data User';
            $data['users'] = $this->M_User->get_akun_karyawan();

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
            $this->M_User->add_user($data);

            // Redirect ke halaman data user setelah berhasil
            redirect('C_User/data_user');
        }
    }

    function edit_user($id_users)
    {
        $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Halaman Ubah User';
            $data['user'] = $this->M_User->get_user_by_id($id_users); // ambil data pengguna dari model
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
                redirect('C_User/data_user');
            } else {
                // Jika update data gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'Gagal mengubah data');
                redirect('C_User/edit_user/' . $id_users);
            }
        }
    }

    function edit_account($id_users)
    {
        $this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Halaman Ubah Akun';
            $data['id_users'] = $id_users;
            $data['user'] = $this->M_User->get_user_by_id($id_users);

            $this->load->view('backend/dashboard/templates/header', $data);
            $this->load->view('backend/dashboard/templates/sidebar');
            $this->load->view('backend/master/user/v_edit_account', $data);
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
                redirect('C_Dashboard');
            } else {
                // Jika update data gagal, tampilkan pesan error
                $this->session->set_flashdata('error', 'Gagal mengubah data');
                redirect('C_User/edit_account/' . $id_users);
            }
        }
    }

    function delete_users($id_users)
    {
        $this->M_User->delete_users($id_users);
        redirect('C_User/data_user');
    }
}
