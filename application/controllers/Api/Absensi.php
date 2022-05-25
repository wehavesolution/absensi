<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if (!$this->session->userdata('nip')) {
			$this->session->set_flashdata('false', 'Maaf anda tidak dapat mengakses halaman tersebut, silahkan login untuk melanjutkan!');
			redirect('/');
		}
        $this->load->model('MAbsensi','ma');
	}

    // Datatabel Absensi Personal
	public function dt_absensi_personal()
	{
		$karyawan_id = $this->session->userdata('id');
        echo $this->ma->dt_absensi_personal($karyawan_id);
	}

    // Aksi untuk melakukan absen masuk
    public function setAbsenMasuk()
    {
        $karyawan_id = $this->session->userdata('id');
        $jam_masuk = date('H:i:s');
        
        $file = $this->saveBase64($this->input->post('img'));
        $q = $this->ma->setMasuk($karyawan_id,$jam_masuk,[
            'img_masuk' => $file
        ]);

        // Response dalam bentuk json
        $rsp['status'] = $q[0];
        $rsp['msg'] = $q[1];
        $rsp['callback'] = $q[2];

        echo json_encode($rsp);
    }

    // Aksi untuk melakukan absen pulang
    public function setAbsenPulang()
    {
        $karyawan_id = $this->session->userdata('id');
        $jam_pulang = date('H:i:s');

        $file = $this->saveBase64($this->input->post('img'));
        $q = $this->ma->setKeluar($karyawan_id,$jam_pulang,[
            'img_keluar' => $file
        ]);

        // Response dalam bentuk json
        $rsp['status'] = $q[0];
        $rsp['msg'] = $q[1];
        $rsp['callback'] = !isset($q[2]) ? @$q[2] : '';
        $rsp['callback_link'] = site_url('Main/absensi_pribadi');

        echo json_encode($rsp);
    }

    // Save Image
    public function saveBase64($data='',$type='png',$path='./uploads/absensi/')
    {
        if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
            $data = substr($data, strpos($data, ',') + 1);
            $type = strtolower($type[1]); // jpg, png, gif
        
            if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
                throw new \Exception('invalid image type');
            }
            $data = str_replace( ' ', '+', $data );
            $data = base64_decode($data);
        
            if ($data === false) {
                throw new \Exception('base64_decode failed');
            }
        }else{
            throw new \Exception('did not match data URI with image data');
        }
        
        $filename = date('YmdHis')."img.{$type}";
        $folder = $path.$filename;
        file_put_contents($folder, $data);

        return $filename;
    }

    // Datatabel Absensi Karyawan
	public function dt_absensi_karyawan()
	{
		$karyawan_id = $this->session->userdata('id');
        echo $this->ma->dt_absensi_karyawan($karyawan_id);
	}

    // Datatabel Absensi Anggota
	public function dt_absensi_anggota()
	{
		$karyawan_id = $this->session->userdata('id');
        echo $this->ma->dt_absensi_anggota($karyawan_id);
	}
}
