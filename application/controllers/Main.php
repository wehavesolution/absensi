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

	public function dashboard_personal()
	{
		$data = [
			'info_absensi' => $this->ma->cek_absen($this->karyawan_id),
			'title' => "ERM :: Dashboard Personal",
			'sub_title' => "Pribadi",
			'page' => "dashboard/dashboard",
			'data' => [
				'total' => $this->ma->getTotal([],$this->karyawan_id),
				'tepat_waktu' => $this->ma->getTotal(['kode_ket' => 'TW'],$this->karyawan_id),
				'telat' => $this->ma->getTotal(['kode_ket' => 'TLT'],$this->karyawan_id),
				'cuti' => $this->ma->getTotal(['kode_ket' => 'CTI'],$this->karyawan_id),
			],
			'link_api' => [
				['dt' , '../Api/absensi/dt_absensi_personal'],
				['grafik' , '../Api/absensi/getChartAbsenTahunPribadi'],
			],
			'js' => [
				'assets/js/dashboard.js'
			]
		];
		$this->load->view('_main',$data);
	}

	public function dashboard_karyawan()
	{
		$data = [
			'info_absensi' => $this->ma->cek_absen($this->karyawan_id),
			'title' => "ERM :: Dashboard Karyawan",
			'sub_title' => "Karyawan",
			'page' => "dashboard/dashboard",
			'data' => [
				'total' => $this->ma->getTotal([]),
				'tepat_waktu' => $this->ma->getTotal(['kode_ket' => 'TW']),
				'telat' => $this->ma->getTotal(['kode_ket' => 'TLT']),
				'cuti' => $this->ma->getTotal(['kode_ket' => 'CTI']),
			],
			'link_api' => [
				['dt','../Api/absensi/dt_absensi_karyawan'],
				['grafik','../Api/absensi/getChartAbsenTahunKaryawan'],
			],
			'js' => [
				'assets/js/dashboard.js'
			]
		];
		$this->load->view('_main',$data);
	}

	public function dashboard_anggota()
	{
		$data = [
			'info_absensi' => $this->ma->cek_absen($this->karyawan_id),
			'title' => "ERM :: Dashboard Anggota",
			'sub_title' => "Anggota",
			'page' => "dashboard/dashboard",
			'data' => [
				'total' => $this->ma->getTotal([],$this->karyawan_id,$leader=true),
				'tepat_waktu' => $this->ma->getTotal(['kode_ket' => 'TW'],$this->karyawan_id,$leader=true),
				'telat' => $this->ma->getTotal(['kode_ket' => 'TLT'],$this->karyawan_id,$leader=true),
				'cuti' => $this->ma->getTotal(['kode_ket' => 'CTI'],$this->karyawan_id,$leader=true),
			],
			'link_api' => [
				['dt' , '../Api/absensi/dt_absensi_anggota'],
				['grafik' , '../Api/absensi/getChartAbsenTahunAnggota'],
			],
			'js' => [
				'assets/js/dashboard.js'
			]
		];
		$this->load->view('_main',$data);
	}

	public function rekap_absensi()
	{
		
		$this->load->model('MJabatan','mj');
		
		$data = [
			'info_absensi' => $this->ma->cek_absen($this->karyawan_id),
			'title' => "ERM :: Rekap Absensi",
			'sub_title' => "Karyawan",
			'page' => "rekap/absensi",
			'data' => [
				'total' => $this->ma->getTotal([]),
				'tepat_waktu' => $this->ma->getTotal(['kode_ket' => 'TW']),
				'telat' => $this->ma->getTotal(['kode_ket' => 'TLT']),
				'cuti' => $this->ma->getTotal(['kode_ket' => 'CTI']),
			],
			'filter' => [
				'f_karyawan' => $this->aut_mk->getKaryawan()->result(),
				'f_jabatan' => $this->mj->getJabatan()->result()
			],
			'link_api' => [
				['dt','../Api/absensi/dt_absensi_karyawan'],
				['grafik_perbulan','../Api/absensi/getChartRekapAbsenBulanKaryawan'],
				['grafik_pertahun','../Api/absensi/getChartAbsenTahunKaryawan'],
			],
			'js' => [
				'assets/js/rekap_absensi.js'
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
			'data' => [
				'total' => $this->ma->getTotal([],$this->karyawan_id),
				'tepat_waktu' => $this->ma->getTotal(['kode_ket' => 'TW'],$this->karyawan_id),
				'telat' => $this->ma->getTotal(['kode_ket' => 'TLT'],$this->karyawan_id),
				'cuti' => $this->ma->getTotal(['kode_ket' => 'CTI'],$this->karyawan_id),
			],
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
		$leader_id = "";
		$id = $this->input->get('id');
		$leader = $this->mk->getLeaderKaryawan($this->karyawan_id);
		if ($leader) {
			$leader_id = $leader->num_rows() > 0 ? $leader->row()->id : null;
		}
		$data = [
			'info_absensi' => $this->ma->cek_absen($this->karyawan_id),
			'title' => "ERM :: Detail Pengajuan",
			'page' => "pengajuan/detail",
			'data' => $this->mp->getIDPengajuan($id),
			'leader_id' => $leader_id,
			'log_data' => $this->mp->getLogPengajuanID($id),
			'js' => [
				'assets/js/pengajuan_detail.js'
			]
		];
		$this->load->view('_main',$data);
	}

	// Anggota
	public function absensi_anggota()
	{
		$this->load->model('MJabatan','mj');
		
		$data = [
			'info_absensi' => $this->ma->cek_absen($this->karyawan_id),
			'title' => "ERM :: Absensi Anggota",
			'page' => "absensi/anggota",
			'filter' => [
				'f_karyawan' => $this->aut_mk->getMyAnggota($this->karyawan_id)->result(),
				'f_jabatan' => $this->mj->getMyAnggotaJabatan($this->karyawan_id)->result()
			],
			'js' => [
				'assets/js/absensi_anggota.js'
			]
		];
		$this->load->view('_main',$data);
	}

	public function pengajuan_anggota()
	{
		$data = [
			'info_absensi' => $this->ma->cek_absen($this->karyawan_id),
			'title' => "ERM :: Pengajuan Anggota",
			'page' => "pengajuan/anggota",
			'filter' => [
				'f_karyawan' => $this->aut_mk->getMyAnggota()->result(),
			],
			'js' => [
				'assets/js/pengajuan_anggota.js'
			]
		];
		$this->load->view('_main',$data);
	}

	// Karyawan 
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

	public function monitoring_absensi()
	{
		$data = [
			'info_absensi' => $this->ma->cek_absen($this->karyawan_id),
			'title' => "ERM :: Monitoring Absensi",
			'page' => "monitoring/monitoring",
			'filter' => [],
			'js' => [
				'assets/js/monitoring.js'
			]
		];
		$this->load->view('_main',$data);
	}

	public function pengaturan_absensi()
	{
		$data = [
			'info_absensi' => $this->ma->cek_absen($this->karyawan_id),
			'title' => "ERM :: Pengaturan Absensi",
			'page' => "pengaturan/absensi",
			'data' => $this->ma->getPengaturanAktif(),
			'js' => [
				'assets/js/pengaturan_absensi.js'
			]
		];
		$this->load->view('_main',$data);
	}
}
