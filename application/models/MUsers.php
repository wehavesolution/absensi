<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MUsers extends CI_Model {

    private $table = "tbl_users";
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
	public function get($where=false)
    {
        if ($where) {
            $q = $this->db->get_where($this->table,$where);
        }else{
            $q = $this->db->get($this->table);
        }
        return $q;
    }
}
