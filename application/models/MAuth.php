<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAuth extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
	public function login($username="",$password="")
	{
        $this->db->select('k.id,nip,nama,k.email,k.img,jabatan_id as jabatan_id, nma_jabatan, leader, jabatan_grp_id as jabatan_grup');
        $this->db->where('u.username', $username);
        $this->db->where('u.password', md5($password));
        $this->db->join('tbl_karyawan k', 'k.users_id = u.id', 'inner');
        $this->db->join('tbl_jabatan j', 'j.id = k.jabatan_id', 'inner');
		$q = $this->db->get('tbl_users u');
        return $q;
	}
    
}
