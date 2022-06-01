<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MAbsensi extends CI_Model {

    private $t = "tbl_absensi";
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('MPengajuan','mp');
    }

    // Get Absen Month
    public function getAbsenMonth($year="",$kode_ket=null,$karyawan_id=null,$leader=false)
    {
        if ($leader) {
            $parent_id = $this->aut_mk->getKaryawan($karyawan_id);
            if ($parent_id->num_rows() > 0) {
                $parent_id = $parent_id->row()->tbl_jabatan_id;
            }

            $this->db->join('tbl_karyawan k', 'k.id = x.karyawan_id', 'inner');
            $this->db->join('tbl_jabatan j', 'j.id = k.tbl_jabatan_id', 'inner');
            
            $this->db->where('j.parent_id',$parent_id);
        }else{
           
        }

        $this->db->where('YEAR(x.ctddate) = '.$year);

        if ($karyawan_id && !$leader) {
            $this->db->where('x.karyawan_id', $karyawan_id);
        }
        
        if (@$kode_ket) {
            $this->db->where('x.kode_ket', $kode_ket);
        }
        $this->db->select('count(*) as jml, month(x.ctddate) as bulan');
        $q = $this->db->get($this->t.' x');
        return $q;
    }

    // Total
    public function getTotal($arr=[],$karyawan_id=null,$leader=false)
    {
        if ($leader) {
            $parent_id = $this->aut_mk->getKaryawan($karyawan_id);
            if ($parent_id->num_rows() > 0) {
                $parent_id = $parent_id->row()->tbl_jabatan_id;
            }

            $this->db->join('tbl_karyawan k', 'k.id = x.karyawan_id', 'inner');
            $this->db->join('tbl_jabatan j', 'j.id = k.tbl_jabatan_id', 'inner');
            
            $this->db->where('j.parent_id',$parent_id);
        }else{
    
            if ($karyawan_id) {
                $this->db->where('x.karyawan_id', $karyawan_id);
            }
        }

        if (@$arr['kode_ket']) {
            $this->db->where('kode_ket', $arr['kode_ket']);
        }

        if (@$arr['ctddate']) {
            $this->db->where('x.ctddate', $arr['ctddate']);
        }

        $q = $this->db->get($this->t.' x');
        return $q->num_rows();
    }

    // Pengaturan Absensi
    public function upPengaturan($obj=[],$where=[])
    {
        $this->db->update('tbl_pengaturan', $obj, $where);
        if ($this->db->affected_rows() > 0) {
            return [true];
        }

        return [false];
    }


    public function inPengaturan($obj='')
    {
        $obj['aktif'] = 1;
        $this->db->insert('tbl_pengaturan', $obj);
        if ($this->db->affected_rows() > 0) {
            return [true, $this->db->insert_id()];
        }

        return [false, null];
    }
    
    public function getPengaturan($where=[])
    {
        $q = [];
        $this->db->select('*');
        $this->db->order_by('id', 'desc');
        if ($where) {
            $q = $this->db->get_where('tbl_pengaturan', $where);
        }else{
            $q = $this->db->get('tbl_pengaturan','a');
        }

        return $q;
    }

    public function getPengaturanAktif()
    {
        $q = $this->getPengaturan([
            'aktif' => 1
        ]);
        
        if ($q->num_rows() > 0) {
            return [true, $q->first_row()->id,$q->first_row()];
        }else{
            return [false, null, null];
        }
    }

    // Cek keterangan absensi
    public function getKetAbsensi($jam="",$status_absen="",$pengaturan_id="")
    {
        $ket_absen = '';
        $pengaturan = $this->getPengaturan(['id' => $pengaturan_id]);
        if ($pengaturan->num_rows() > 0) {
            $pengaturan = $pengaturan->row();

            if ($status_absen == "CTI" || $status_absen == "LMB" || $status_absen == "PJLDNS" || $status_absen == "IZN" || $status_absen == "TDKMSK" || $status_absen == "SKT" || $status_absen == "KORABSN") {
                $ket_absen = $status_absen;
            }else{

                $_jam = strtotime(date('Y-m-d ').$jam);
                $_jam_telat = strtotime(date('Y-m-d ').$pengaturan->jam_telat);
                $_jam_keluar = strtotime(date('Y-m-d ').$pengaturan->jam_keluar);
                $_jam_buka = strtotime(date('Y-m-d ').$pengaturan->jam_buka);
                $_jam_tutup = strtotime(date('Y-m-d ').$pengaturan->jam_tutup);

                if ($_jam >= $_jam_telat && $_jam <= $_jam_keluar && $status_absen == "I") {
                    $ket_absen = "TLT"; //Telat
                }else if (($_jam >= $_jam_buka && $_jam <= $_jam_telat) &&  $_jam <= $_jam_keluar &&  $status_absen == "I") {
                    $ket_absen = "TW"; //Tepat Waktu
                }else if ($_jam > $_jam_telat && $_jam < $_jam_keluar && $status_absen == "O") {
                    $ket_absen = "TSK"; //Pulang dengan tidak sesuai ketentuan
                }else if (($_jam >= $_jam_keluar && $_jam <= $_jam_tutup) && $status_absen == "I") {
                    $ket_absen = "ABSNMSKDLUAR"; //Absen Masuk diluar jam yang sudah ditentukan
                }else if ($_jam >= $_jam_keluar && $_jam <= $_jam_tutup && $status_absen == "O") {
                    $ket_absen = "ABSNPLNGDLUAR"; //Absen Pulang diluar jam yang sudah ditentukan
                }else if ($_jam >= $_jam_telat && $_jam <= $_jam_tutup && $status_absen == "O") {
                    $ket_absen = "ABSNDLUARJMTLT"; //Absen sesudah jam telat yang sudah ditentukan
                }else{
                    $ket_absen = $status_absen;
                }
            }

           $q = $this->db->get_where('tbl_ket_absensi', ['kode_ket' => $ket_absen]);
           if ($q->num_rows() > 0) {
               return [true, $q, $ket_absen];
           }
        }

        return [false,[],[]];
    }

    // Log Absensi
    public function inLogAbsensi($obj='')
    {
        $obj['ctddate'] = date('Y-m-d');
        $obj['ctdtime'] = date('H:i:s');
        $this->db->insert('tbl_log_absensi', $obj);
        if ($this->db->affected_rows() > 0) {
            return [true, $this->db->insert_id()];
        }

        return [false, null];
    }

    public function getAbensi($where=[])
    {
        $q = [];
        $this->db->select('a.*,nama,email,nip,img');
        $this->db->join('tbl_karyawan k', 'k.id = a.karyawan_id', 'inner');
        if ($where) {
            $q = $this->db->get_where($this->t.' a', $where);
        }else{
            $q = $this->db->get($this->t.' a');
        }

        return $q;
    }

    public function cek_absen($karyawan_id='', $date='')
    {
        $date = ($date == '') ? date('Y-m-d') : $date = $date;
        // Jika true maka karyawan diwajibkan untuk melakukan absen 
        // Karyawan sudah melakukan asben masuk hari ini
        $q = $this->getAbensi([
            'karyawan_id' => $karyawan_id,
            'tanggal' => date('Y-m-d'),
            'jam_masuk !=' => '',
            'jam_keluar' => null, 
        ]);

        if ($q->num_rows() > 0) {
            $data = $q->row();
            $pukul = explode(':',$data->jam_masuk);
            return [true, $data, "Kamu sudah melakukan absen masuk hari ini pada pukul <b>".$pukul[0].':'.$pukul[1]."</b>, apakah kamu ingin melakukan absen pulang sekarang ?",$priority=2];
        }else{
            // Karyawan sudah melakukan asben masuk dan pulang hari ini
            $q1 = $this->getAbensi([
                'karyawan_id' => $karyawan_id,
                'tanggal' => date('Y-m-d'),
                'jam_masuk !=' => null,
                'jam_keluar !=' => null,
                'jam_masuk !=' => '',
                'jam_keluar !=' => '', 
            ]);
            if ($q1->num_rows() > 0) {
                return [false, $q->row(), "kamu sudah melakukan absen masuk dan pulang hari ini",$priority=4];
            }else{

                 // Karyawan sudah melakukan asben masuk dan pulang hari ini
                $q2 = $this->getAbensi([
                    'karyawan_id' => $karyawan_id,
                    'tanggal' => date('Y-m-d'),
                    'tbl_pengajuan_id !=' => '', 
                ]);
                if ($q2->num_rows() > 0) {
                    return [false, $q->row(), "kamu tidak dapat melakukan absen, karena hari ini kamu sudah izin",$priority=3];
                }else{
                    return [true, null, "kamu belum melakukan absen masuk hari ini",$priority=1];
                }
            }
        }
    }

    public function inAbsensi($obj='')
    {
        $obj['ctddate'] = date('Y-m-d');
        $obj['ctdtime'] = date('H:i:s');
        $this->db->insert($this->t, $obj);
        if ($this->db->affected_rows() > 0) {
            return [true, $this->db->insert_id()];
        }

        return [false, null];
    }

    public function upAbsensi($obj=[],$where=[])
    {
        $this->db->update($this->t, $obj, $where);
        if ($this->db->affected_rows() > 0) {
            return [true];
        }

        return [false];
    }

    // Modal untuk menabahkan data  absen masuk karyawan ke database
    public function setMasuk($karyawan_id='',$jam_masuk='',$data=[],$date='')
    {
        $kode_ket = "";
        $date = ($date == '') ? date('Y-m-d') : $date = $date;
        $status_absensi = 'I';
        $cek_absen = $this->cek_absen($karyawan_id,$date);
        if ($cek_absen[0] && $cek_absen[3] == 2) { // Priority 2 karyawan sudah melakukan absen masuk sebelumnya
            return [false,$cek_absen[2]];
        }else if($cek_absen[0] && $cek_absen[3] == 1){  // Priority 1 karyawan belum melakukan absen masuk
            if($this->getPengaturanAktif()[0]) {
                $pengaturan_id = $this->getPengaturanAktif()[1];
                $_kode_ket = $this->getKetAbsensi($jam_masuk,$status_absensi,$pengaturan_id); // Kode keterangan absensi
                if ($_kode_ket[0]) {
                    $kode_ket = $_kode_ket[2]; //Ambil return kode keterangannya
                }else{
                    return [false, "Kode keterangan tidak ditemukan, harap hubungi admin!"];
                }
            }else{
                return [false, "Admin belum mengatur penetapan absensi, mohon hubungi Admin!"];
            }

            if ($karyawan_id && $jam_masuk) {
                $datas = [
                    'status_absensi' => $status_absensi,
                    'karyawan_id' => $karyawan_id,
                    'jam_masuk' => $jam_masuk,
                    'aktif' => 1,
                    'pengaturan_id' => $pengaturan_id,
                    'tanggal' => $date,
                    'kode_ket' => $kode_ket
                ];
                
                if ($data) {
                    foreach ($data as $k => $v) {
                        $datas[$k] = $v;
                    }    
                }

                $q = $this->inAbsensi($datas);
                if ($q[0]) {

                    // Insert log absen
                    $this->inLogAbsensi([
                        'status_absensi' => $status_absensi,
                        'karyawan_id' => $karyawan_id,
                        'jam' => $jam_masuk,
                        'kode_ket' => $kode_ket
                    ]);

                    $q[1] = 'Berhasil melakukan absen masuk';
                    $cek_absen = $this->cek_absen($karyawan_id,$date);
                    $q[2] = $cek_absen[2];
                    return $q; //[status,pesan,callback]
                }
            }
        }

        return [false, "Gagal melakukan absen masuk",false];
    }   

    // Modal untuk mengupdate data absen pulang karyawan ke database
    public function setKeluar($karyawan_id='',$jam_keluar='',$data=[],$date='')
    {
        $msg = "Gagal melakukan absen pulang";
        $status = false;
        $status_absensi = "O";
        $kode_ket = "";
        $date = ($date == '') ? date('Y-m-d') : $date = $date;
        $cek_absen = $this->cek_absen($karyawan_id,$date);
        if ($cek_absen[0] && $cek_absen[3] == 4) { // Priority 4 karyawan sudah melakukan absen masuk dan pulang
            $msg = $cek_absen[2];
            // Insert log absen pulang
            $this->logAbsensiPulang($status_absensi,$karyawan_id,$jam_keluar,$msg,$status,$kode_ket);
            return [$status,$cek_absen[2]];
        }else if($cek_absen[0] && $cek_absen[3] == 2){  // Priority 2 karyawan belum melakukan absen pulang
            if ($karyawan_id && $jam_keluar) {

                // update kode keterangan
                $pengaturan_id = $cek_absen[1]->pengaturan_id;
                $_kode_ket = $this->getKetAbsensi($jam_keluar,$status_absensi,$pengaturan_id); // Kode keterangan absensi
                if ($_kode_ket[0]) {
                    $kode_ket = $_kode_ket[2]; //Ambil return kode keterangannya
                }else{
                    $msg = "Kode keterangan tidak ditemukan, harap hubungi admin!";
                    // Insert log absen pulang
                    $this->logAbsensiPulang($status_absensi,$karyawan_id,$jam_keluar,$msg,$status,$kode_ket);
                    return [$status, $msg];
                }

                $datas = [
                    'status_absensi' => $status_absensi,
                    'jam_keluar' => $jam_keluar,
                    'kode_ket' => $kode_ket
                ];

                if ($data) {
                    foreach ($data as $k => $v) {
                        $datas[$k] = $v;
                    }    
                }

                $q = $this->upAbsensi($datas,[
                    'karyawan_id' => $karyawan_id,
                    'tanggal' => $date,
                ]);
                if ($q[0]) {

                    $msg = 'Berhasil melakukan absen pulang';
                    $status = true;
                    $q[1] = $msg;
                    $cek_absen = $this->cek_absen($karyawan_id,$date);
                    $q[2] = $cek_absen[2];

                    // Insert log absen pulang
                    $this->logAbsensiPulang($status_absensi,$karyawan_id,$jam_keluar,$msg,$status,$kode_ket);
                    return $q; //mengeluarkan nilai array [true, pesan]
                }else{
                    // Insert log absen pulang
                    $this->logAbsensiPulang($status_absensi,$karyawan_id,$jam_keluar,$msg,$status,$kode_ket);
                    return [$status, 'Gagal melakukan absen pulang']; 
                }
            }
        }

        // Insert log absen pulang
        $this->logAbsensiPulang($status_absensi,$karyawan_id,$jam_keluar,$msg,$status,$kode_ket);
        return [$status, $msg, false];
    }

    public function logAbsensiPulang($status_absensi="",$karyawan_id="",$jam_keluar="",$msg="",$status="",$kode_ket="")
    {
        $this->inLogAbsensi([
            'status_absensi' => $status_absensi ? $status_absensi : '',
            'karyawan_id' => $karyawan_id ? $karyawan_id : '',
            'jam' => $jam_keluar ? $jam_keluar : '',
            'msg' => $msg,
            'status' => $status,
            'kode_ket' => $kode_ket ? $kode_ket : ''
        ]);
    }

    // Modal untuk menambahkan data izin absen karyawan ke database
    public function setIzin($karyawan_id='',$status_izin='',$pengajuan_id='',$date='')
    {
        $date = ($date == '') ? date('Y-m-d') : $date = $date;

        if($this->getPengaturanAktif()[0]) {
            $pengaturan_id = $this->getPengaturanAktif()[1];
        }else{
            return [false, "Admin belum mengatur penetapan absensi, mohon hubungi Admin!"];
        }

        if ($karyawan_id && $status_izin && $pengajuan_id && $date) {
            $q = $this->inAbsensi([
                'status_absensi' => $status_izin,
                'kode_ket' => $status_izin,
                'karyawan_id' => $karyawan_id,
                'tbl_pengajuan_id' => $pengajuan_id,
                'pengaturan_id' => $pengaturan_id,
                'aktif' => 1,
                'tanggal' => $date,
            ]);
            if ($q[0]) {
                $ket = $this->input->post('keterangan');
                $this->mp->inLogPengajuan([
                    'pengajuan_id' => $pengajuan_id,
                    'msg' => $ket,
                    'ctdby' => $this->session->userdata('id'),
                    'accept' =>'0',
                    'acceptNote' => $ket
                ]);

                $q[1] = 'Berhasil melakukan izin';
                return $q; //mengeluarkan nilai array [true, callback nilai id setelah insert data ke db, pesan]
            }
        }

        return [false, "Gagal melakukan izin"];
    }

    private function setStatus($status='')
    {
        if ($status == "I") {
            return "Masuk";
        }else if($status == "O"){
            return  "Pulang";
        }else if($status == "CU"){
            return "Cuti";
        }else if($status == "LM"){
            return "Lembur";
        }else if($status == "PD"){
            return "Perjalanan Dinas";
        }
    }
	
    public function dt_absensi_personal($karyawan_id=null)
    {
         // Definisi
         $condition = [];
         $data = [];
 
        $tahun = $this->input->post('tahun');

         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         // Set table name
         $CI->dt->table = 'tbl_absensi as ta';
         // Set orderable column fields
         $CI->dt->column_order = [null,'tanggal','nama','jam_masuk','jam_keluar','status_absensi','keterangan'];
         // Set searchable column fields
         $CI->dt->column_search = ['tanggal','nama','jam_masuk','jam_keluar','keterangan'];
         // Set select column fields
         $CI->dt->select = 'k.nama,ta.id, tanggal, jam_masuk, jam_keluar, ta.status_absensi, ka.keterangan';
         // Set default order
         $CI->dt->order = ['ta.id' => 'desc'];

         if ($tahun) {
            $con = ['where','YEAR(ta.ctddate) = ',$tahun];
            array_push($condition,$con);
         }

         $con = ['where','karyawan_id',$karyawan_id];
         array_push($condition,$con);

         $con = ['join','tbl_karyawan k','k.id = ta.karyawan_id','inner'];
         array_push($condition,$con);

         $con = ['join','tbl_ket_absensi ka','ka.kode_ket = ta.kode_ket','inner'];
         array_push($condition,$con);

         // Fetch member's records
         $dataTabel = $this->dt->getRows(@$_POST, $condition);
 
         $i = @$this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                 $i,
                 $dt->tanggal,
                 $dt->nama,
                 $dt->jam_masuk,
                 $dt->jam_keluar,
                //  $this->setStatus($dt->status_absensi)
                 $dt->keterangan
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


    public function dt_absensi_karyawan()
    {
         // Definisi
         $condition = [];
         $data = [];

        //  Definisi inputan filter
        $i_karyawan = $this->input->post('i_karyawan');
        $i_jabatan = $this->input->post('i_jabatan');
        $i_status_absensi = $this->input->post('i_status_absensi');
        $i_date = $this->input->post('i_ctddate');
        
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         // Set table name
         $CI->dt->table = 'tbl_absensi as ta';
         // Set orderable column fields
         $CI->dt->column_order = [null,'tanggal','nama','jam_masuk','jam_keluar','status_absensi','keterangan'];
         // Set searchable column fields
         $CI->dt->column_search = ['tanggal','nama','jam_masuk','jam_keluar','keterangan'];
         // Set select column fields
         $CI->dt->select = 'k.nama,ta.id, tanggal, jam_masuk, jam_keluar, ta.status_absensi, ka.keterangan';
         // Set default order
         $CI->dt->order = ['ta.id' => 'desc'];

         $con = ['join','tbl_karyawan k','k.id = ta.karyawan_id','inner'];
         array_push($condition,$con);

         $con = ['join','tbl_ket_absensi ka','ka.kode_ket = ta.kode_ket','inner'];
         array_push($condition,$con);


        //  Filter berdasarkan nama karyawan
        if ($i_karyawan) {
            $con = ['where','k.id',$i_karyawan];
            array_push($condition,$con);
        }

        //  Filter berdasarkan jabatan
        if ($i_jabatan) {
            $con = ['where','k.tbl_jabatan_id',$i_jabatan];
            array_push($condition,$con);
        }

        //  Filter berdasarkan status
        if ($i_status_absensi) {
            $con = ['where','ta.status_absensi',$i_status_absensi];
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
                 $dt->tanggal,
                 $dt->nama,
                 $dt->jam_masuk,
                 $dt->jam_keluar,
                //  $this->setStatus($dt->status_absensi)
                 $dt->keterangan
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

    public function dt_monitoring_absensi()
    {
         // Definisi
         $condition = [];
         $data = [];

        //  Definisi inputan filter
        $i_date_start = $this->input->post('i_date_start');
        $i_date_end = $this->input->post('i_date_end');
        
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         // Set table name
         $CI->dt->table = 'tbl_absensi as ta';
         // Set orderable column fields
         $CI->dt->column_order = [null,null,null,null];
         // Set searchable column fields
         $CI->dt->column_search = [null,null,null,null,null];
         // Set select column fields
         $CI->dt->select = '*';
         // Set default order
         $CI->dt->order = ['ta.id' => 'desc'];


        //  Filter berdasarkan tanggal
        if ($i_date_start) {
            $con = ['where','ta.ctddate >=',$i_date_start];
            array_push($condition,$con);
        }

        if ($i_date_end) {
            $con = ['where','ta.ctddate <=',$i_date_end];
            array_push($condition,$con);
        }

        $this->db->group_by('ta.ctddate');

         // Fetch member's records
         $dataTabel = $this->dt->getRows(@$_POST, $condition);
        
         $i = @$this->input->post('start');
         foreach ($dataTabel as $dt) {
             $i++;
             $data[] = array(
                 $i,
                 $this->getAbensi(['ctddate' => $dt->ctddate])->num_rows() > 0 ? $this->getAbensi(['ctddate' => $dt->ctddate])->num_rows() : 0,
                 $this->getAbensi(['ctddate' => $dt->ctddate])->num_rows() > 0 ? $this->getAbensi(['ctddate' => $dt->ctddate, 'kode_ket' => 'TW'])->num_rows() : 0,
                 $this->getAbensi(['ctddate' => $dt->ctddate])->num_rows() > 0 ? $this->getAbensi(['ctddate' => $dt->ctddate, 'kode_ket' => 'TLT'])->num_rows() : 0,
                 tgl_indo($dt->ctddate),
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
    
    // Anggota
    public function dt_absensi_anggota()
    {
         // Definisi
         $condition = [];
         $data = [];

        //  Definisi inputan filter
        $i_karyawan = $this->input->post('i_karyawan');
        $i_jabatan = $this->input->post('i_jabatan');
        $i_status_absensi = $this->input->post('i_status_absensi');
        $i_date = $this->input->post('i_date');
        
         $CI = &get_instance();
         $CI->load->model('DataTable', 'dt');
         // Set table name
         $CI->dt->table = 'tbl_absensi as ta';
         // Set orderable column fields
         $CI->dt->column_order = [null,'tanggal','nama','jam_masuk','jam_keluar','status_absensi','keterangan'];
         // Set searchable column fields
         $CI->dt->column_search = ['tanggal','nama','jam_masuk','jam_keluar','keterangan'];
         // Set select column fields
         $CI->dt->select = 'k.nama,ta.id, tanggal, jam_masuk, jam_keluar, ta.status_absensi, ka.keterangan';
         // Set default order
         $CI->dt->order = ['ta.id' => 'desc'];

         $con = ['join','tbl_karyawan k','k.id = ta.karyawan_id','inner'];
         array_push($condition,$con);

         $con = ['join','tbl_ket_absensi ka','ka.kode_ket = ta.kode_ket','inner'];
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

        //  Filter berdasarkan jabatan
        if ($i_jabatan) {
            $con = ['where','k.tbl_jabatan_id',$i_jabatan];
            array_push($condition,$con);
        }

        //  Filter berdasarkan status
        if ($i_status_absensi) {
            $con = ['where','ta.status_absensi',$i_status_absensi];
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
                 $dt->tanggal,
                 $dt->nama,
                 $dt->jam_masuk,
                 $dt->jam_keluar,
                //  $this->setStatus($dt->status_absensi)
                 $dt->keterangan
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

