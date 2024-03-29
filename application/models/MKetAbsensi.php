<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MKetAbsensi extends CI_Model {

    private $t = "tbl_ket_absensi";
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getKetAbsensi($kode_ket="")
    {
        $this->db->select('*');
        if ($kode_ket) {
            $q = $this->db->get_where($this->t,['kode_ket' => $kode_ket]);
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