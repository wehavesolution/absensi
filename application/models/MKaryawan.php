<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MKaryawan extends CI_Model {

    private $t = "tbl_karyawan";
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function inKaryawan($obj='')
    {
        $obj['ctddate'] = date('Y-m-d');
        $obj['ctdtime'] = date('H:i:s');
        $this->db->insert($this->t, $obj);
        if ($this->db->affected_rows() > 0) {
            return [true, $this->db->insert_id()];
        }

        return [false, null];
    }

    public function getKaryawan($karyawan_id='')
    {
        $this->db->select('k.*,j.parent_id');
        $this->db->join('tbl_jabatan j', 'j.id = k.tbl_jabatan_id', 'inner');
        $this->db->where('k.id', $karyawan_id);
        $q = $this->db->get($this->t.' k');
        return $q;
    }

    public function getLeaderKaryawan($karyawan_id='')
    {
        $first_q = $this->getKaryawan($karyawan_id);
        if ($first_q->num_rows() > 0) {
            $tmp_first_q = $first_q->row();
            // Get Leadernya
            if ($tmp_first_q->parent_id) {
                $second_q = $this->db->get_where($this->t, ['tbl_jabatan_id' => $tmp_first_q->parent_id]);
                return $second_q;
            }

        }

        return false;
    }

    public function getHRDKaryawan()
    {
        $this->db->select('k.*,j.parent_id');
        $this->db->join('tbl_jabatan j', 'j.id = k.tbl_jabatan_id', 'inner');
        $this->db->where('tbl_jabatan_id', '3'); 
        $q = $this->db->get($this->t.' k');
        return $q;
    }

    public function getNamaKaryawan($karyawan_id)
    {
        $nama = '';
        $q = $this->getKaryawan($karyawan_id);
        if ($q->num_rows() > 0) {
            return $q->row()->nama;
        }

        return $nama;
    }

}