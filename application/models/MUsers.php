<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MUsers extends CI_Model {

    private $t = "tbl_users";
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
	public function get($where=false)
    {
        if ($where) {
            $q = $this->db->get_where($this->t,$where);
        }else{
            $q = $this->db->get($this->t);
        }
        return $q;
    }

    public function inUsers($obj='')
    {
        $obj['ctddate'] = date('Y-m-d');
        $obj['ctdtime'] = date('H:i:s');
        $this->db->insert($this->t, $obj);
        if ($this->db->affected_rows() > 0) {
            return [true, $this->db->insert_id()];
        }

        return [false, null];
    }

    public function upUsers($obj='',$where=[])
    {
        $this->db->update($this->t, $obj, $where);
        if ($this->db->affected_rows() > 0) {
            return [true, $obj];
        }

        return [false, null];
    }
}
