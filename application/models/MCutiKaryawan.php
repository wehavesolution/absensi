<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MCutiKaryawan extends CI_Model {

    private $t = "tbl_cuti_karyawan";
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
  
    
    public function getCutiKaryawan($where=[], $tahun=NULL)
    {
        $q = [];
        $this->db->select('p.*,k.nama');
        $this->db->order_by('p.id', 'desc');
        $this->db->join('tbl_karyawan k', 'k.id = p.karyawan_id', 'inner');

        $tahun = $tahun ? $tahun :  date('Y');

        $this->db->where('tahun',$tahun);
        if ($where) {
            $q = $this->db->get_where($this->t.' p', $where);
        }else{
            $q = $this->db->get($this->t.' p');
        }

        return $q;
    }

    public function getIDCutiKaryawan($id="")
    {
       $q = $this->getCutiKaryawan(['p.karyawan_id' => $id]);
        if ($q->num_rows() > 0 ) {
            return $q->row();
        }

        return false;
    }

    public function inCutiKaryawan($obj='')
    {
        $obj['ctddate'] = date('Y-m-d');
        $obj['ctdtime'] = date('H:i:s');
        $this->db->insert($this->t, $obj);
        if ($this->db->affected_rows() > 0) {
            return [true, $this->db->insert_id()];
        }

        return [false, null];
    }

    public function deCutiKaryawan($pengajuan_id='')
    {
        $this->db->delete($this->t, ['id' => $pengajuan_id]);
        if ($this->db->affected_rows() > 0) {
            return [true, null];
        }

        return [false, null];
    }


    public function upCutiKarywan($obj='',$where=[])
    {
        $this->db->update($this->t, $obj, $where);
        if ($this->db->affected_rows() > 0) {
            return [true, $obj];
        }

        return [false, null];
    }

}