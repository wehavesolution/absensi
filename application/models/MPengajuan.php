<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MPengajuan extends CI_Model {

    private $t = "tbl_pengajuan";
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
  
    
    public function getPengajuan($where=[])
    {
        $q = [];
        $this->db->select('p.*,tka.keterangan as ket_pengajuan, k.nama');
        $this->db->order_by('p.id', 'desc');
        $this->db->join('tbl_ket_absensi tka', 'tka.kode_ket = p.status_pengajuan', 'inner');
        $this->db->join('tbl_karyawan k', 'k.id = p.karyawan_id', 'inner');
        if ($where) {
            $q = $this->db->get_where($this->t.' p', $where);
        }else{
            $q = $this->db->get($this->t.' p');
        }

        return $q;
    }

    public function getIDPengajuan($id="")
    {
       $q = $this->getPengajuan(['p.id' => $id]);
        if ($q->num_rows() > 0 ) {
            return $q->row();
        }

        return false;
    }

    public function dt_pengajuan_personal($karyawan_id=null)
    {
         // Definisi
         $condition = [];
         $data = [];
 
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         // Set table name
         $CI->dt->table = 'tbl_pengajuan as ta';
         // Set orderable column fields
         $CI->dt->column_order = [null,'ctddate','ctdtime','nama','keterangan','status_pengajuan_str','diterima'];
         // Set searchable column fields
         $CI->dt->column_search = ['ctddate','ctdtime','nama','keterangan','status_pengajuan_str','diterima'];
         // Set select column fields
         $CI->dt->select = 'ta.*,k.nama,ka.keterangan as status_pengajuan_str';
         // Set default order
         $CI->dt->order = ['ta.id' => 'desc'];

         $con = ['where','karyawan_id',$karyawan_id];
         array_push($condition,$con);

         $con = ['join','tbl_karyawan k','k.id = ta.karyawan_id','inner'];
         array_push($condition,$con);

         $con = ['join','tbl_ket_absensi ka','ka.kode_ket = ta.status_pengajuan','inner'];
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
                 $dt->nama,
                 $dt->keterangan,
                 $dt->status_pengajuan_str,
                 $this->setTerimaPengajuan($dt->diterima),
                 '<a href="'.site_url('Main/detail_pengajuan?id='.$dt->id).'" clsss="btn btn-sm btn-primary">Detail</a>'
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

    public function dt_pengajuan_karyawan()
    {
         // Definisi
         $condition = [];
         $data = [];

        //  Definisi inputan filter
        $i_karyawan = $this->input->post('i_karyawan');
        $i_status = $this->input->post('i_status');
        $i_diterima = $this->input->post('i_diterima');
        $i_date = $this->input->post('i_date');
 
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         // Set table name
         $CI->dt->table = 'tbl_pengajuan as ta';
         // Set orderable column fields
         $CI->dt->column_order = [null,'ctddate','ctdtime','nama','keterangan','status_pengajuan_str','diterima'];
         // Set searchable column fields
         $CI->dt->column_search = ['ctddate','ctdtime','nama','keterangan','status_pengajuan_str','diterima'];
         // Set select column fields
         $CI->dt->select = 'ta.*,k.nama,ka.keterangan as status_pengajuan_str';
         // Set default order
         $CI->dt->order = ['ta.id' => 'desc'];

         $con = ['join','tbl_karyawan k','k.id = ta.karyawan_id','inner'];
         array_push($condition,$con);

         $con = ['join','tbl_ket_absensi ka','ka.kode_ket = ta.status_pengajuan','inner'];
         array_push($condition,$con);

        //  Filter berdasarkan nama karyawan
        if ($i_karyawan) {
            $con = ['where','k.id',$i_karyawan];
            array_push($condition,$con);
        }

        //  Filter berdasarkan status
        if ($i_status) {
            $con = ['where','ta.status_pengajuan',$i_status];
            array_push($condition,$con);
        }

        //  Filter berdasarkan pengajuan diterima/tidak
        if ($i_diterima) {
            $con = ['where','ta.diterima',$i_diterima];
            array_push($condition,$con);
        }

        //  Filter berdasarkan tanggal
        if ($i_date) {
            $con = ['where','ta.ctddate',$i_date];
            array_push($condition,$con);
        }

         // Fetch member's records
         $dataTabel = $this->dt->getRows(@$_POST, $condition);
 
         $i = @$this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                 $i,
                 $dt->ctddate,
                 $dt->ctdtime,
                 $dt->nama,
                 $dt->keterangan,
                //  $dt->status_pengajuan_str,
                 $this->setTerimaPengajuan($dt->diterima),
                 'safas',
                 '<a href="'.site_url('Main/detail_pengajuan?id='.$dt->id).'" clsss="btn btn-sm btn-primary">Detail</a>'
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

    public function setTerimaPengajuan($terima='')
    {
        if ($terima==0) {
            return "Belum di proses";
        }else if($terima==1){
            return "Pengajuan di Setujui";
        }else if($terima==2){
            return "Pengajuan di Tolak";
        }
    }

    public function inPengajuan($obj='')
    {
        $obj['ctddate'] = date('Y-m-d');
        $obj['ctdtime'] = date('H:i:s');
        $this->db->insert($this->t, $obj);
        if ($this->db->affected_rows() > 0) {
            return [true, $this->db->insert_id()];
        }

        return [false, null];
    }

    public function dePengajuan($pengajuan_id='')
    {
        $this->db->delete($this->t, ['id' => $pengajuan_id]);
        if ($this->db->affected_rows() > 0) {
            return [true, null];
        }

        return [false, null];
    }


    public function upPengajuan($obj='',$where=[])
    {
        $this->db->update($this->t, $obj, $where);
        if ($this->db->affected_rows() > 0) {
            return [true, $obj];
        }

        return [false, null];
    }

    public function kirimPengajuan($obj=[])
    {
        $this->load->model('MAbsensi','ma');
        $q = $this->inPengajuan($obj);
        if ($q[0]) {
            $qq = $q;
            // $qq = $this->ma->setIzin($obj['karyawan_id'],$obj['status_pengajuan'],$q[1]);
            // if ($qq[0]) {
            $qq[2] = $q[1]; //ambil id pengajuan
            return $qq;
            // }
        }

        return [false, "Gagal melakukan izin"]; 
    }

    // Log Pengajuan
    public function inLogPengajuan($obj='')
    {
        $obj['ctddate'] = date('Y-m-d');
        $obj['ctdtime'] = date('H:i:s');
        $this->db->insert("tbl_log_pengajuan", $obj);
        if ($this->db->affected_rows() > 0) {
            return [true, $this->db->insert_id()];
        }

        return [false, null];
    }

    public function getLogPengajuan($where=[])
    {
        $q = [];
        $this->db->select('lp.*,tka.keterangan as ket_pengajuan, k.nama');
        $this->db->order_by('lp.id', 'desc');
        $this->db->join('tbl_pengajuan p', 'p.id = lp.pengajuan_id', 'inner');
        $this->db->join('tbl_ket_absensi tka', 'tka.kode_ket = p.status_pengajuan', 'inner');
        $this->db->join('tbl_karyawan k', 'k.id = p.karyawan_id', 'inner');
        if ($where) {
            $q = $this->db->get_where('tbl_log_pengajuan lp', $where);
        }else{
            $q = $this->db->get('tbl_log_pengajuan lp');
        }

        return $q;
    }

    public function getLogPengajuanID($pengajuan_id=[])
    {
      $q = $this->getLogPengajuan(['lp.pengajuan_id' => $pengajuan_id]);
      if ($q->num_rows() > 0) {
        $r = [];
        $no = 1;
        foreach ($q->result() as $k => $v) {
            $r[$k]['msg'] = $this->msg_log_pengajuan($v);  
        }

        return $r;
      }

      return false;
    }

    public function msg_log_pengajuan($data)
    {
        if ($data->acceptNum == "1") {
            $jbtn = "Leader";
        }else if($data->acceptNum == "2"){
            $jbtn = "HRD";
        }else{
            $jbtn = "Karyawan";
        }

        $note = "";
        if ($data->acceptNote) {
            $note = "<br><span style='font-size:12px;color:#777;'>Keterangan/Catatan : <u>".$data->acceptNote."</u></span>";
        }

        if ($data->accept == "1") {
            $ket = "Pengajuan ".$data->ket_pengajuan." disetujui";
        }else if($data->accept == "2"){
            $ket = "Pengajuan ".$data->ket_pengajuan." ditolak";
        }else if ($data->accept == "0") {
            return "<b>".tgl_indo($data->ctddate)."</b>".'<span style="margin-left: 4px;font-size: 12px;color: #666;">'.time_indo($data->ctdtime).' WIB </span>'."</br>".$this->aut_mk->getNamaKaryawan($data->ctdby)." mengajukan "."$data->ket_pengajuan".$note;
        }else if($data->accept == "3"){
            return "<b>".tgl_indo($data->ctddate)."</b>".'<span style="margin-left: 4px;font-size: 12px;color: #666;">'.time_indo($data->ctdtime).' WIB </span>'."</br>".$this->aut_mk->getNamaKaryawan($data->ctdby)." membatalkan pengajuan "."$data->ket_pengajuan".$note;
        }        

        return "<b>".tgl_indo($data->ctddate)."</b>".'<span style="margin-left: 4px;font-size: 12px;color: #666;">'.time_indo($data->ctdtime).' WIB </span>'."</br>".$ket." oleh ".$this->aut_mk->getNamaKaryawan($data->acceptBy)." (".$jbtn.")".$note;
    }

    // ACT Pengajuan

    public function inActPengajuan($obj='')
    {
        $this->db->insert('tbl_pengajuan_act', $obj);
        if ($this->db->affected_rows() > 0) {
            return [true, $this->db->insert_id()];
        }

        return [false, null];
    }

    // PENGAJUAN ANGGOTA

    public function dt_pengajuan_anggota()
    {
         // Definisi
         $condition = [];
         $data = [];

        //  Definisi inputan filter
        $i_karyawan = $this->input->post('i_karyawan');
        $i_status = $this->input->post('i_status');
        $i_diterima = $this->input->post('i_diterima');
        $i_date = $this->input->post('i_date');
 
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         // Set table name
         $CI->dt->table = 'tbl_pengajuan as ta';
         // Set orderable column fields
         $CI->dt->column_order = [null,'ctddate','ctdtime','nama','keterangan','status_pengajuan_str','diterima'];
         // Set searchable column fields
         $CI->dt->column_search = ['ctddate','ctdtime','nama','keterangan','status_pengajuan_str','diterima'];
         // Set select column fields
         $CI->dt->select = 'ta.*,k.nama,ka.keterangan as status_pengajuan_str';
         // Set default order
         $CI->dt->order = ['ta.id' => 'desc'];

         $con = ['join','tbl_karyawan k','k.id = ta.karyawan_id','inner'];
         array_push($condition,$con);

         $con = ['join','tbl_ket_absensi ka','ka.kode_ket = ta.status_pengajuan','inner'];
         array_push($condition,$con);

         $con = ['join','tbl_jabatan tj','tj.id = k.tbl_jabatan_id','inner'];
         array_push($condition,$con);

        $q = $this->aut_mk->getKaryawan($this->session->userdata('id'));
        if ($q->num_rows() > 0) {
            $parent_id = $q->row()->tbl_jabatan_id;

            $con = ['where','tj.parent_id',$parent_id];
            array_push($condition,$con);
        }else{
            $output = array(
                "draw" => 0,
                "recordsTotal" => 0,
                "recordsFiltered" => 0,
                "data" => [],
            );
            return json_encode($output);
        }

        //  Filter berdasarkan nama karyawan
        if ($i_karyawan) {
            $con = ['where','k.id',$i_karyawan];
            array_push($condition,$con);
        }

        //  Filter berdasarkan status
        if ($i_status) {
            $con = ['where','ta.status_pengajuan',$i_status];
            array_push($condition,$con);
        }

        //  Filter berdasarkan pengajuan diterima/tidak
        if ($i_diterima) {
            $con = ['where','ta.diterima',$i_diterima];
            array_push($condition,$con);
        }

        //  Filter berdasarkan tanggal
        if ($i_date) {
            $con = ['where','ta.ctddate',$i_date];
            array_push($condition,$con);
        }

         // Fetch member's records
         $dataTabel = $this->dt->getRows(@$_POST, $condition);
 
         $i = @$this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                 $i,
                 $dt->ctddate,
                 $dt->ctdtime,
                 $dt->nama,
                 $dt->keterangan,
                 $dt->status_pengajuan_str,
                 $this->setTerimaPengajuan($dt->diterima),
                 '<a href="'.site_url('Main/detail_pengajuan?id='.$dt->id).'" clsss="btn btn-sm btn-primary">Detail</a>'
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