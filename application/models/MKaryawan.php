<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MKaryawan extends CI_Model {

    private $t = "tbl_karyawan";
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('MJabatan', 'mj');
    }

    public function inKaryawan($obj='')
    {
        // $obj['ctddate'] = date('Y-m-d');
        // $obj['ctdtime'] = date('H:i:s');
        $this->db->insert($this->t, $obj);
        if ($this->db->affected_rows() > 0) {
            return [true, $this->db->insert_id()];
        }

        return [false, null];
    }

    public function getKaryawan($karyawan_id='')
    {
        $this->db->select('k.*,j.parent_id');
        $this->db->join('tbl_jabatan j', 'j.id = k.jabatan_id', 'inner');
        if ($karyawan_id) {
            $this->db->where('k.id', $karyawan_id);
            $this->db->where('k.aktif', 1);
        }
        $q = $this->db->get($this->t.' k');
        return $q;
    }

    public function getMyAnggota($karyawan_id='')
    {
        $parent_id = $this->getKaryawan($karyawan_id);
        if ($parent_id->num_rows() > 0) {
            $parent_id = $parent_id->row()->jabatan_id;
        }

        $this->db->select('k.*,j.parent_id');
        $this->db->join('tbl_jabatan j', 'j.id = k.jabatan_id', 'inner');
        $this->db->where('j.parent_id', $parent_id);
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
                $second_q = $this->db->get_where($this->t, ['jabatan_id' => $tmp_first_q->parent_id]);
                return $second_q;
            }

        }

        return false;
    }

    public function getHRDKaryawan()
    {
        $this->db->select('k.*,j.parent_id');
        $this->db->join('tbl_jabatan j', 'j.id = k.jabatan_id', 'inner');
        $this->db->where('jabatan_id', '3'); 
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

    
    public function dt_karyawan(){
        // Definisi
        $condition = [];
        $data = [];

        $CI = &get_instance();
        $CI->load->model('DataTable', 'dt');
        // Set table name
        $CI->dt->table = 'tbl_karyawan as ta';
        // Set orderable column fields
        $CI->dt->column_order = [null,'nip','nama','nama_group','nma_jabatan',null];
        // Set searchable column fields
        $CI->dt->column_search = ['nip','nama','nama_group','nma_jabatan'];
        // Set select column fields
        $CI->dt->select = 'ta.*, tjg.nama_group, tj.nma_jabatan,tj.jabatan_grp_id,tck.jumlah';
        // Set default order
        $CI->dt->order = ['ta.id' => 'desc'];

        $con = ['join','tbl_jabatan tj','tj.id = ta.jabatan_id','inner'];
        array_push($condition,$con);

        $con = ['join','tbl_jabatan_grup tjg','tjg.id = tj.jabatan_grp_id','inner'];
        array_push($condition,$con);

        $con = ['join','tbl_cuti_karyawan tck','tck.karyawan_id = ta.id AND  tck.tahun = '.date('Y'),'left'];
        array_push($condition,$con);

        // $con = ['where','tck.tahun',date('Y')];
        // array_push($condition,$con);

        // Fetch member's records
        $dataTabel = $this->dt->getRows(@$_POST, $condition);

        $i = @$this->input->post('start');
        foreach ($dataTabel as $dt) {

            // ekstarak parent id
            $jabatan = $this->mj->getJabatanById($dt->jabatan_id) ? $this->mj->getJabatanById($dt->jabatan_id)->nma_jabatan : '-';
            $jabatan_grup = $this->mj->getJabatanGrupById($dt->jabatan_grp_id) ? $this->mj->getJabatanGrupById($dt->jabatan_grp_id)->nama_group : '-';

            $nama = "'".$dt->nama."'"; 

            $i++;
            $data[] = array(
                $i,
                $dt->nip,
                $dt->nama,
                $jabatan_grup,
                $jabatan,
                $dt->jumlah ? $dt->jumlah : 0,
                '<a href="javascript:voidi(0)" data-bs-toggle="modal" onclick="ganti_password('.$dt->users_id.','.$nama.')" data-bs-target="#ganti_pw_modal">Ganti Password</a>',
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