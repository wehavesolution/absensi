<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MNotif extends CI_Model {

    private $t = "tbl_notif";
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('MKaryawan','mk');
    }

    // Notifikasi kepada
    public function getNotifTo($to='')
    {
        $this->db->select('n.*');
        $this->db->join('tbl_karyawan k', 'k.id = n.to', 'inner');
        $this->db->where('n.to', $to);
        $q = $this->db->get($this->t.' n');
        return $q;
    }

    public function countNotifToRead($karyawan_id)
    {
        $count = 0;
        $this->db->where('n.read', 1);
        $q = $this->getNotifTo($karyawan_id);
        $count = $q->num_rows();
        return $count;
    }

    public function countNotifToNotRead($karyawan_id)
    {
        $count = 0;
        $this->db->where('n.read', 0);
        $q = $this->getNotifTo($karyawan_id);
        $count = $q->num_rows();
        return $count;
    }
    

    public function getNotifFrom($from='')
    {
        $this->db->select('n.*');
        $this->db->join('tbl_karyawan k', 'k.id = n.from', 'inner');
        $this->db->where('n.from', $from);
        $q = $this->db->get($this->t.' n');
        return $q;
    }

    public function dt_notif($karyawan_id=null)
    {
         // Definisi
         $condition = [];
         $data = [];
 
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         // Set table name
         $CI->dt->table = 'tbl_notif as n';
         // Set orderable column fields
         $CI->dt->column_order = [null,'ctddate','ctdtime','pesan','from','to','ka.keterangan'];
         // Set searchable column fields
         $CI->dt->column_search = ['ctddate','ctdtime','pesan','to','ka.keterangan'];
         // Set select column fields
         $CI->dt->select = 'n.*,k.nama,ka.keterangan';
         // Set default order
         $CI->dt->order = ['n.id' => 'desc'];

         $con = ['where','to',$karyawan_id];
         array_push($condition,$con);

         $con = ['join','tbl_karyawan k','k.id = n.to','inner'];
         array_push($condition,$con);

         $con = ['join','tbl_ket_absensi ka','ka.kode_ket = n.kode_action','inner'];
         array_push($condition,$con);

         // Fetch member's records
         $dataTabel = $this->dt->getRows(@$_POST, $condition);
 
         $i = @$this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                 $i,
                 $dt->ctddate,
                 $dt->ctdtime,
                 $dt->pesan,
                 $this->mk->getNamaKaryawan($dt->from),
                 $dt->nama,
                 $dt->keterangan,
                 '<a href="'.site_url('Notif/direct_link?link='.$dt->link.'&notif_id='.$dt->id).'" clsss="btn btn-sm btn-primary">Lihat</a>'
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

    public function inNotif($obj='')
    {
        $obj['ctddate'] = date('Y-m-d');
        $obj['ctdtime'] = date('H:i:s');
        $this->db->insert($this->t, $obj);
        if ($this->db->affected_rows() > 0) {
            return [true, $this->db->insert_id()];
        }

        return [false, null];
    }

    public function upNotif($obj=[],$where=[])
    {
        $this->db->update($this->t, $obj, $where);
        if ($this->db->affected_rows() > 0) {
            return [true];
        }

        return [false];
    }

    public function kirimNotif($dari,$kepada,$msg,$action_id,$link,$kode_action,$status_create='1')
    {
        $obj = [
            'from' => $dari,
            'to' => $kepada,
            'pesan' => $msg,
            'action_id' => $action_id,
            'kode_action' => $kode_action,
            'link' => $link,
            'status_create' => $status_create
        ];
        return $this->inNotif($obj);
    }

}