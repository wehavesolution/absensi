<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notif extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if (!$this->session->userdata('nip')) {
			$this->session->set_flashdata('false', 'Maaf anda tidak dapat mengakses halaman tersebut, silahkan login untuk melanjutkan!');
			redirect('/');
		}

		$this->load->model('MAbsensi','ma');
		$this->load->model('MNotif','mn');
		$this->karyawan_id = $this->session->userdata('id');
	}

	public function index()
	{
		$data = [
			'info_absensi' => $this->ma->cek_absen($this->karyawan_id),
			'title' => "ERM :: Notifikasi",
			'page' => "notif/notif",
			'js' => [
				'assets/js/notif.js'
			]
		];
		$this->load->view('_main',$data);
	}

	public function direct_link($link='')
	{
		$notif_id = $this->input->get('notif_id');
		$link = $this->input->get('link');
		$this->mn->upNotif(['read' => 1], ['id' => $notif_id]);
		redirect($link);
	}

}
