<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if (!$this->session->userdata('nip')) {
			$this->session->set_flashdata('false', 'Maaf anda tidak dapat mengakses halaman tersebut, silahkan login untuk melanjutkan!');
			redirect('/');
		}
        $this->load->model('MUsers','mu');
        $this->load->model('MKaryawan','mk');
	}

    public function dt_users()
	{
        echo $this->mk->dt_karyawan();
	}

    public function in_users(){
        $rsp = [
            'status' => false,
            'msg' => 'Gagal menambahakan users'
        ];

        $nama = $this->input->post('nama');
        $nip = $this->input->post('nip');
        $jabatan_id = $this->input->post('jabatan_id');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $query_user = $this->mu->inUsers([
            'username' => $nip,
            'email' => $email,
            'password' => md5($password),
        ]);

        $query = $this->mk->inKaryawan([
            'nama' => $nama,
            'nip' => $nip,
            'jabatan_id' => $jabatan_id,
            'email' => $email,
            'aktif' => 1,
            'users_id' => $query_user[1],
            'img' => 'avatar.png'
        ]);

        if($query[0]){
            $rsp['status'] = true;
            $rsp['msg'] = "Berhasil menambahkan users";
        }

        echo json_encode($rsp);
    }

    public function ganti_password(){
        $rsp = [
            'status' => false,
            'msg' => 'Gagal ubah password'
        ];

        $password = $this->input->post('password');
        $users_id = $this->input->post('users_id');
        
        $query = $this->mu->upUsers([
            'password' => md5($password)
        ],['id' => $users_id]);

        if($query[0]){
            $rsp['status'] = true;
            $rsp['msg'] = "Berhasil mengganti password";
        }

        echo json_encode($rsp);
    }

}
