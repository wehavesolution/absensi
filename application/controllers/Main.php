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

		$this->load->model('MAbsensi','ma');
		$this->load->model('MPengajuan','mp');
		$this->karyawan_id = $this->session->userdata('id');
	}

	public function dashboard()
	{
		$data = [
			'info_absensi' => $this->ma->cek_absen($this->karyawan_id),
			'title' => "ERM :: Dashboard",
			'page' => "dashboard/dashboard",
			'js' => [
				'assets/js/dashboard.js'
			]
		];
		$this->load->view('_main',$data);
	}

	public function absensi_pribadi()
	{
		$data = [
			'info_absensi' => $this->ma->cek_absen($this->karyawan_id),
			'title' => "ERM :: Absensi Pribadi",
			'page' => "absensi/pribadi",
			'js' => [
				'assets/js/absensi_pribadi.js'
			]
		];
		$this->load->view('_main',$data);
	}

	public function pengajuan_pribadi()
	{
		$data = [
			'info_absensi' => $this->ma->cek_absen($this->karyawan_id),
			'title' => "ERM :: Pengajuan Personal",
			'page' => "pengajuan/pribadi",
			'js' => [
				'assets/js/pengajuan_pribadi.js'
			]
		];
		$this->load->view('_main',$data);
	}

	public function detail_pengajuan()
	{
		$id = $this->input->get('id');


		$data = [
			'info_absensi' => $this->ma->cek_absen($this->karyawan_id),
			'title' => "ERM :: Detail Pengajuan",
			'page' => "pengajuan/detail",
			'data' => $this->mp->getIDPengajuan($id),
			'log_data' => $this->mp->getLogPengajuanID($id),
			'js' => [
				'assets/js/pengajuan_detail.js'
			]
		];
		$this->load->view('_main',$data);
	}

	// Karyawan or Angota
	public function absensi_karyawan()
	{
		$this->load->model('MJabatan','mj');
		
		$data = [
			'info_absensi' => $this->ma->cek_absen($this->karyawan_id),
			'title' => "ERM :: Absensi Karyawan",
			'page' => "absensi/karyawan",
			'filter' => [
				'f_karyawan' => $this->aut_mk->getKaryawan()->result(),
				'f_jabatan' => $this->mj->getJabatan()->result()
			],
			'js' => [
				'assets/js/absensi_karyawan.js'
			]
		];
		$this->load->view('_main',$data);
	}

	public function pengajuan_karyawan()
	{
		$data = [
			'info_absensi' => $this->ma->cek_absen($this->karyawan_id),
			'title' => "ERM :: Pengajuan Karyawan",
			'page' => "pengajuan/karyawan",
			'filter' => [
				'f_karyawan' => $this->aut_mk->getKaryawan()->result(),
			],
			'js' => [
				'assets/js/pengajuan_karyawan.js'
			]
		];
		$this->load->view('_main',$data);
	}
}
