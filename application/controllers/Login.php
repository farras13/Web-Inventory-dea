<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('login_model', 'lm');
		date_default_timezone_set('Asia/Jakarta');
	}


	public function index()
	{
		if ($this->session->userdata('data_session') != null) {
			redirect('Dashboard', 'refresh');
		} else {
			$this->load->view('login/index');
		}
	}

	public function proses_login()
	{
		$this->form_validation->set_rules('username', 'username', 'trim|required', array('required' => 'username harus diisi'));
		$this->form_validation->set_rules('password', 'password', 'trim|required', array('required' => 'Password harus diisi'));
		
		if ($this->form_validation->run() == TRUE) {
			$w = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$cek = $this->lm->cek('petugas', $w)->row();
			if ($cek != null) {

				$array = array(
					'username' => $cek->username,
					'password' => $cek->password,
					'login' => TRUE,
					'level' => $cek->nama_instansi,
				);
				$this->session->set_userdata('data_session', $array);

				redirect('Barang', 'refresh');
			} else {
				redirect('Login', 'refresh');
			}
		}else {
			redirect('Login', 'refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}
}

/* End of file Login.php */
