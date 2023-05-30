<?php
defined('BASEPATH') or exit('No direct script access allowed');

class C_Auth extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_User');
	}

	function index()
	{
		// Jika pengguna sudah login, arahkan ke halaman dashboard
		if ($this->session->userdata('username')) {
			redirect('C_Dashboard');
		}

		// Validasi form
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			// Tampilkan halaman masuk
			$data['judul'] = 'Halaman Masuk';
			$this->load->view('backend/auth/templates/header');
			$this->load->view('backend/auth/v_login');
			$this->load->view('backend/auth/templates/footer');
		} else {
			// Ambil data dari form
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// Cek apakah pengguna dengan username tertentu ada di database
			if ($this->M_User->check_user($username)) {
				// Ambil data pengguna dari database
				$users = $this->M_User->get_user($username);

				// Cek apakah password yang dimasukkan cocok dengan hash password di database
				if (password_verify($password, $users->password)) {
					// Jika password cocok, simpan data pengguna ke session
					$data = array(
						'username' => $users->username
					);
					$this->session->set_userdata($data);

					// Redirect ke halaman dashboard
					redirect('C_Dashboard');
				} else {
					// Jika password salah, tampilkan pesan kesalahan
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password salah!</div>');
					redirect('C_Auth');
				}
			} else {
				// Jika username tidak ditemukan di database, tampilkan pesan kesalahan
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Username tidak ditemukan!</div>');
				redirect('C_Auth');
			}
		}
	}

	function logout()
	{
		// Hapus data pengguna dari session
		$this->session->unset_userdata('username');

		// Redirect ke halaman login
		redirect('C_Auth');
	}

	function ganti_password()
	{
		if (!$this->session->userdata('username')) {
			redirect('C_Auth');
		}

		$username = $this->session->userdata('username');
		$user = $this->M_User->get_user($username);

		$this->form_validation->set_rules('password1', 'Password Baru', 'trim|required|min_length[3]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Ulangi Password Baru', 'trim|required|min_length[3]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Halaman Ganti Password';

			$this->load->view('backend/dashboard/templates/header', $data);
			$this->load->view('backend/dashboard/templates/sidebar');
			$this->load->view('backend/password/v_ganti_password');
			$this->load->view('backend/dashboard/templates/footer');
		} else {
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);

			$this->db->set('password', $password);
			$this->db->where('username', $username);
			$this->db->update('users');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password telah diubah!</div>');
			redirect('C_Dashboard');
		}
	}

	function reset_password($id_users)
	{
		$user = $this->M_User->get_user_by_id($id_users);
		$username = $user->username;
		$new_password = $username; // password baru sama dengan username

		$this->M_User->update_password($id_users, $new_password);

		redirect('C_User/data_user');
	}
}
