<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CutiKaryawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if (!$this->session->userdata('nip')) {
			$this->session->set_flashdata('false', 'Maaf anda tidak dapat mengakses halaman tersebut, silahkan login untuk melanjutkan!');
			redirect('/');
		}
        $this->load->model('MCutiKaryawan','mck');
	}

    public function self_jml_cuti_karyawan()
    {
        $id = $this->session->userdata('id');
        $jml_cuti = $this->mck->getIDCutiKaryawan($id);
        $jml_cuti = $jml_cuti ? $jml_cuti->jumlah : 0;
        $rsp = [
            'data' => $jml_cuti,
            'status' => true,
            'msg' => "Menampilkan data cuti karyawan"
        ];
        echo json_encode($rsp);
    }

}
