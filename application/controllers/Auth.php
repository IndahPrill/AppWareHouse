<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_m');
	}

	public function login()
	{
		check_already_login();
		$this->load->view('login');
	}

	public function process()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->user_m->login($post);
			// print_r($query); die();
			if ($query) {
				$this->session->set_flashdata('successLogin', 'Login Berhasil');
				$data['title'] = "Dashboard";
				$this->template->load('Template/HomePage', 'dashboard', $data);
				// echo "<script>
				// alert('Login berhasil'); window.location ='".site_url('dashboard')."';
				// </script>";
			} else {
				$this->session->set_flashdata('error', 'Password atau username salah');
				$this->load->view('login');
				// echo "<script>
				// alert('Password atau username salah'); window.location ='".site_url('auth/login')."';
				// </script>";
			}
		} else {
			$this->session->set_flashdata('error', 'Gagal Login');
			$this->load->view('login');
		}
	}

	public function logout()
	{
		$username   =   $this->session->userdata('username');
        $this->user_m->logout($username);
        $this->session->set_flashdata('notif', 'Loguot Berhasil, Terima Kasih');
		$params = array(
			'user_id',
			'username',
			'nama',
			'level',
			'is_active',
			'date_login',
			'status_login',
		);
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
}
