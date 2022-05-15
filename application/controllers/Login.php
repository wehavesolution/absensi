<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('MAuth','ma');
		
	}

	public function index()
	{
		$data = [
			'title' => "ERM :: Login",
		];
		$this->load->view('_login',$data);
	}

	public function auth_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$q = $this->ma->login($username,$password);
		if ($q->num_rows() > 0) {
		$d = $q->row();	
		 $array = array(
			 'id' => $d->id,
			 'nip' => $d->nip,
			 'username' => $username,
			 'jabatan_id' => $d->jabatan_id,
			 'jabatan' => $d->nma_jabatan,
			 'nama' => $d->nama,
			 'img' => $d->img,
			 'jabatan_grup' => $d->jabatan_grup,
			 'leader' => $d->leader
		 );
		 $this->session->set_userdata($array);
		
		 $this->session->set_flashdata('true', 'Berhasil login ke system');
		 redirect('Main/Dashboard');
		}else{
		 $this->session->set_flashdata('false', 'Gagal login, harap periksa kembali username dan password yang anda masukan');
		}
		redirect('/');
	}

	public function auth_logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
