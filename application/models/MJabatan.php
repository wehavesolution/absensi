<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MJabatan extends CI_Model {

    private $t = "tbl_jabatan";
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getMyAnggotaJabatan($karyawan_id='')
    {
        $parent_id = $this->aut_mk->getKaryawan($karyawan_id);
        if ($parent_id->num_rows() > 0) {
            $parent_id = $parent_id->row()->tbl_jabatan_id;
        }

        $q = $this->db->get_where($this->t, ['parent_id' => $parent_id]);
        return $q;
    }

    public function getJabatan($jabatan_grp_id="")
    {
        $this->db->select('*');
        if ($jabatan_grp_id) {
            $q = $this->db->get_where($this->t,['jabatan_grp_id' => $jabatan_grp_id]);
            if ($q->num_rows() > 0) {
                return $q;
            }
        }else{
            $q = $this->db->get($this->t);
            if ($q->num_rows() > 0) {
                return $q;
            }
        }
        

        return false;
    }
}