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
        $this->load->model('MNotif','mn');
	}

    // Datatabel Notifikasi
	public function dt_notif()
	{
		$karyawan_id = $this->session->userdata('id');
        echo $this->mn->dt_notif($karyawan_id);
	}
}