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
		if(isset($post['login'])) {
			$query= $this->user_m->login($post);
			// print_r($query); die();
			if($query->num_rows() > 0){
				$row = $query->row();
				$params = array(
					'userid' => $row->user_id,
					'level' => $row->level
				);
				$this->session->set_userdata($params);
				$this->session->set_flashdata('notif', 'Login Berhasil');
				redirect(base_url() . "dashboard/index");
				// echo "<script>
				// alert('Login berhasil'); window.location ='".site_url('dashboard')."';
				// </script>";
			} else{
				$this->session->set_flashdata('notif', 'Password atau username salah');
				redirect(base_url() . "auth/login");
				// echo "<script>
				// alert('Password atau username salah'); window.location ='".site_url('auth/login')."';
				// </script>";
			}
		}
	}

	public function logout()
	{
		$params = array('userid', 'level');
		$this->session->unset_userdata($params);
		redirect('auth/login');
	}
}
