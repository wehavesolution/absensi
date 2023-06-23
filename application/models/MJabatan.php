<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MJabatan extends CI_Model {

    private $t = "tbl_jabatan";
    private $t2 = "tbl_jabatan_grup";
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getMyAnggotaJabatan($karyawan_id='')
    {
        $parent_id = $this->aut_mk->getKaryawan($karyawan_id);
        if ($parent_id->num_rows() > 0) {
            $parent_id = $parent_id->row()->jabatan_id;
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

    public function getJabatanById($id="")
    {
        $q = $this->db->get_where($this->t, ['id' => $id]);
        if ($q->num_rows() > 0) {
            return $q->row();
        }else{
            return false;
        }
    }

    public function dt_jabatan(){
        // Definisi
        $condition = [];
        $data = [];

        $CI = &get_instance();
        $CI->load->model('DataTable', 'dt');
        // Set table name
        $CI->dt->table = 'tbl_jabatan as ta';
        // Set orderable column fields
        $CI->dt->column_order = [null,'nma_jabatan','parent_id','leader','nama_group','admin'];
        // Set searchable column fields
        $CI->dt->column_search = ['nma_jabatan','parent_id','leader','nama_group','admin'];
        // Set select column fields
        $CI->dt->select = 'ta.*, tjg.nama_group';
        // Set default order
        $CI->dt->order = ['ta.id' => 'desc'];

        $con = ['join','tbl_jabatan_grup tjg','tjg.id = ta.jabatan_grp_id','inner'];
        array_push($condition,$con);

        // Fetch member's records
        $dataTabel = $this->dt->getRows(@$_POST, $condition);

        $i = @$this->input->post('start');
        foreach ($dataTabel as $dt) {

            // ekstarak parent id
            $parent_id = $this->getJabatanById($dt->parent_id) ? $this->getJabatanById($dt->parent_id)->nma_jabatan : '-';
            $leader = $dt->leader ? 'Ya' : '-';
            $admin = $dt->admin == "1" ? 'Ya' : '-';

            $i++;
            $data[] = array(
                $i,
                $dt->nma_jabatan,
                $parent_id,
                $leader,
                $dt->nama_group,
                $admin,
            );
        }

        $output = array(
            "draw" => @$this->input->post('draw'),
            "recordsTotal" => $this->dt->countAll($condition),
            "recordsFiltered" => $this->dt->countFiltered(@$this->input->post(), $condition),
            "data" => $data,
        );

        // Output to JSON format
        return json_encode($output);
    }

    public function inJabatan($obj='')
    {
        // $obj['ctddate'] = date('Y-m-d');
        // $obj['ctdtime'] = date('H:i:s');
        $this->db->insert($this->t, $obj);
        if ($this->db->affected_rows() > 0) {
            return [true, $this->db->insert_id()];
        }

        return [false, null];
    }

    public function deJabatan($jabatan_id='')
    {
        $this->db->delete($this->t, ['id' => $jabatan_id]);
        if ($this->db->affected_rows() > 0) {
            return [true, null];
        }

        return [false, null];
    }

    public function upJabatan($obj='',$where=[])
    {
        $this->db->update($this->t, $obj, $where);
        if ($this->db->affected_rows() > 0) {
            return [true, $obj];
        }

        return [false, null];
    }

    // Jabatan Grup
    public function getJabatanGrupById($id="")
    {
        $q = $this->db->get_where($this->t2, ['id' => $id]);
        if ($q->num_rows() > 0) {
            return $q->row();
        }else{
            return false;
        }
    }

    public function getJabatanGrup($jabatan_grp_id="")
    {
        $this->db->select('*');
        $q = $this->db->get($this->t2);
        if ($q->num_rows() > 0) {
            return $q;
        }
        
        return false;
    }

    public function inJabatanGrup($obj='')
    {
        $obj['ctddate'] = date('Y-m-d');
        $obj['ctdby'] = $this->session->userdata('id');
        $this->db->insert($this->t2, $obj);
        if ($this->db->affected_rows() > 0) {
            return [true, $this->db->insert_id()];
        }

        return [false, null];
    }

    public function deJabatanGrup($jabatan_id='')
    {
        $this->db->delete($this->t2, ['id' => $jabatan_id]);
        if ($this->db->affected_rows() > 0) {
            return [true, null];
        }

        return [false, null];
    }

    public function upJabatanGrup($obj='',$where=[])
    {
        $this->db->update($this->t2, $obj, $where);
        if ($this->db->affected_rows() > 0) {
            return [true, $obj];
        }

        return [false, null];
    }

    public function dt_jabatan_grup(){
        // Definisi
        $condition = [];
        $data = [];

        $CI = &get_instance();
        $CI->load->model('DataTable', 'dt');
        // Set table name
        $CI->dt->table = 'tbl_jabatan_grup as ta';
        // Set orderable column fields
        $CI->dt->column_order = [null,'nama_group','ctddate'];
        // Set searchable column fields
        $CI->dt->column_search = ['nama_group','ctddate'];
        // Set select column fields
        $CI->dt->select = 'ta.*';
        // Set default order
        $CI->dt->order = ['ta.id' => 'desc'];

        $con = ['where','aktif',1];
        array_push($condition,$con);

        // Fetch member's records
        $dataTabel = $this->dt->getRows(@$_POST, $condition);

        $i = @$this->input->post('start');
        foreach ($dataTabel as $dt) {
            $i++;
            $data[] = array(
                $i,
                $dt->nama_group,
                $dt->ctddate
            );
        }

        $output = array(
            "draw" => @$this->input->post('draw'),
            "recordsTotal" => $this->dt->countAll($condition),
            "recordsFiltered" => $this->dt->countFiltered(@$this->input->post(), $condition),
            "data" => $data,
        );

        // Output to JSON format
        return json_encode($output);
    }
}