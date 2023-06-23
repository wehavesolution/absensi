<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jabatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if (!$this->session->userdata('nip')) {
			$this->session->set_flashdata('false', 'Maaf anda tidak dapat mengakses halaman tersebut, silahkan login untuk melanjutkan!');
			redirect('/');
		}
        $this->load->model('MJabatan','mj');
	}

    public function get_jabatan(){
        $rsp = [
            'status' => true,
            'msg' => 'Berhasil menarik data',
            'data' => []
        ];

        $rsp['data'] = $this->mj->getJabatan() ? $this->mj->getJabatan()->result() : [];
        echo json_encode($rsp);
    }

    public function get_jabatan_by_id($id){
        $rsp = [
            'status' => true,
            'msg' => 'Berhasil menarik data',
            'data' => []
        ];

        $rsp['data'] = $this->mj->getJabatanById($id) ? $this->mj->getJabatanById($id) : [];
        echo json_encode($rsp);
    }

    public function dt_jabatan()
	{
        echo $this->mj->dt_jabatan();
	}

    public function in_jabatan(){
        $rsp = [
            'status' => false,
            'msg' => 'Gagal menambahakan jabatan'
        ];

        $nma_jabatan = $this->input->post('nma_jabatan');
        $parent_id = $this->input->post('parent_id');
        $leader = $this->input->post('leader');
        $admin = $this->input->post('admin');
        $keterangan = $this->input->post('keterangan');
        $jabatan_grp_id = $this->input->post('jabatan_grp_id');
        
        $query = $this->mj->inJabatan([
            'nma_jabatan' => $nma_jabatan,
            'parent_id' => $parent_id,
            'leader' => $leader,
            'admin' => $admin,
            'keterangan' => $keterangan,
            'jabatan_grp_id' => $jabatan_grp_id
        ]);

        if($query[0]){
            $rsp['status'] = true;
            $rsp['msg'] = "Berhasil menambahkan jabatan";
        }

        echo json_encode($rsp);
    }

    public function up_jabatan(){
        $rsp = [
            'status' => false,
            'msg' => 'Gagal update jabatan'
        ];

        $id = $this->input->post('id');

        $nma_jabatan = $this->input->post('nma_jabatan');
        $parent_id = $this->input->post('parent_id');
        $leader = $this->input->post('leader');
        $admin = $this->input->post('admin');
        $keterangan = $this->input->post('keterangan');
        $jabatan_grp_id = $this->input->post('jabatan_grp_id');
        
        $query = $this->mj->upJabatan([
            'nma_jabatan' => $nma_jabatan,
            'parent_id' => $parent_id,
            'leader' => $leader,
            'admin' => $admin,
            'keterangan' => $keterangan,
            'jabatan_grp_id' => $jabatan_grp_id
        ],['id' => $id]);

        if($query[0]){
            $rsp['status'] = true;
            $rsp['msg'] = "Berhasil update jabatan";
        }

        echo json_encode($rsp);
    }


    // Datatabel Jabatan Grup

    public function get_jabatan_grup(){
        $rsp = [
            'status' => true,
            'msg' => 'Berhasil menarik data',
            'data' => []
        ];

        $rsp['data'] = $this->mj->getJabatanGrup() ? $this->mj->getJabatanGrup()->result() : [];
        echo json_encode($rsp);
    }

    public function get_jabatan_grup_by_id($id){
        $rsp = [
            'status' => true,
            'msg' => 'Berhasil menarik data',
            'data' => []
        ];

        $rsp['data'] = $this->mj->getJabatanGrupById($id) ? $this->mj->getJabatanGrupById($id) : [];
        echo json_encode($rsp);
    }

	public function dt_jabatan_grup()
	{
        echo $this->mj->dt_jabatan_grup();
	}

    public function in_jabatan_grup(){
        $rsp = [
            'status' => false,
            'msg' => 'Gagal menambahakan jabatan grup'
        ];

        $nama_group = $this->input->post('nama_group');
        $query = $this->mj->inJabatanGrup([
            'nama_group' => $nama_group
        ]);

        if($query[0]){
            $rsp['status'] = true;
            $rsp['msg'] = "Berhasil menambahkan jabatan grup";
        }

        echo json_encode($rsp);
    }

    public function inactive_jabatan_grup(){
        $rsp = [
            'status' => false,
            'msg' => 'Gagal menonaktifkan jabatan grup'
        ];

        $query = $this->mj->upJabatanGrup([
            'aktif' => 0,
        ]);

        if($query[0]){
            $rsp['status'] = true;
            $rsp['msg'] = "Berhasil menonaktifkan jabatan grup";
        }

        echo json_encode($rsp);
    }

}
