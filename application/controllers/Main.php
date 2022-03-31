<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if (!$this->session->userdata('nip')) {
			$this->session->set_flashdata('false', 'Maaf anda tidak dapat mengakses halaman tersebut, silahkan login untuk melanjutkan!');
			redirect('/');
		}
	}
	

	public function dashboard()
	{
		$data = [
			'title' => "ERM :: Dashboard",
			'page' => "dashboard/dashboard"
		];
		$this->load->view('_main',$data);
	}
}
