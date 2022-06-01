<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if (!$this->session->userdata('nip')) {
			$this->session->set_flashdata('false', 'Maaf anda tidak dapat mengakses halaman tersebut, silahkan login untuk melanjutkan!');
			redirect('/');
		}
        $this->load->model('MAbsensi','ma');
	}

    // Datatabel Absensi Personal
	public function dt_absensi_personal()
	{
		$karyawan_id = $this->session->userdata('id');
        echo $this->ma->dt_absensi_personal($karyawan_id);
	}

    // Aksi untuk melakukan absen masuk
    public function setAbsenMasuk()
    {
        $karyawan_id = $this->session->userdata('id');
        $jam_masuk = date('H:i:s');
        
        $file = $this->saveBase64($this->input->post('img'));
        $q = $this->ma->setMasuk($karyawan_id,$jam_masuk,[
            'img_masuk' => $file,
            'online' => 1
        ]);

        // Response dalam bentuk json
        $rsp['status'] = $q[0];
        $rsp['msg'] = @$q[1];
        $rsp['callback'] = @$q[2];

        echo json_encode($rsp);
    }

    // Aksi untuk melakukan absen pulang
    public function setAbsenPulang()
    {
        $karyawan_id = $this->session->userdata('id');
        $jam_pulang = date('H:i:s');

        $file = $this->saveBase64($this->input->post('img'));
        $q = $this->ma->setKeluar($karyawan_id,$jam_pulang,[
            'img_keluar' => $file,
            'online' => 1
        ]);

        // Response dalam bentuk json
        $rsp['status'] = $q[0];
        $rsp['msg'] = $q[1];
        $rsp['callback'] = !isset($q[2]) ? @$q[2] : '';
        $rsp['callback_link'] = site_url('Main/absensi_pribadi');

        echo json_encode($rsp);
    }

    // Save Image
    public function saveBase64($data='',$type='png',$path='./uploads/absensi/')
    {
        if (preg_match('/^data:image\/(\w+);base64,/', $data, $type)) {
            $data = substr($data, strpos($data, ',') + 1);
            $type = strtolower($type[1]); // jpg, png, gif
        
            if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
                throw new \Exception('invalid image type');
            }
            $data = str_replace( ' ', '+', $data );
            $data = base64_decode($data);
        
            if ($data === false) {
                throw new \Exception('base64_decode failed');
            }
        }else{
            throw new \Exception('did not match data URI with image data');
        }
        
        $filename = date('YmdHis')."img.{$type}";
        $folder = $path.$filename;
        file_put_contents($folder, $data);

        return $filename;
    }

    // Datatabel Absensi Karyawan
	public function dt_absensi_karyawan()
	{
		$karyawan_id = $this->session->userdata('id');
        echo $this->ma->dt_absensi_karyawan($karyawan_id);
	}

     // Datatabel Monitoring Absensi
	public function dt_monitoring_absensi()
	{
        echo $this->ma->dt_monitoring_absensi();
	}

    // Pengaturan
    public function setPengaturan()
    {
        $rsp = [
            'status' => false,
            'msg' => "Gagal mengubah pengaturan"
        ];

        $jam_telat = $this->input->post('jam_telat');
        $jam_pulang = $this->input->post('jam_pulang');
        $jam_buka = $this->input->post('jam_buka');
        $jam_tutup = $this->input->post('jam_tutup');
        $id = $this->input->post('id');

        $where = $this->ma->getPengaturan(['id' => $id]);
        if ($where->num_rows() > 0) {
            $q = $where->first_row();
            if ($q->jam_buka == $jam_buka && $q->jam_telat == $jam_telat && $q->jam_keluar == $jam_pulang && $q->jam_tutup == $jam_tutup) {
                $rsp['msg'] = "Tidak ada perubahan waktu absen pada pengaturan"; 
                echo json_encode($rsp);
                return false;
            }
        }

        $this->ma->upPengaturan(['aktif' => 0], ['id' => $id]);
        $x = $this->ma->inPengaturan([
            'tgl_target' => date('Y-m-d'),
            'jam_buka' => $jam_buka,
            'jam_telat'=> $jam_telat,
            'jam_keluar'=> $jam_pulang,
            'jam_tutup' => $jam_tutup,
        ]);
        
        if ($x[0]) {
            $rsp['status'] = true;
            $rsp['msg'] = "Berhasil mengubah pengaturan";
        }


        echo json_encode($rsp);
    }

    // Datatabel Absensi Anggota
	public function dt_absensi_anggota()
	{
		$karyawan_id = $this->session->userdata('id');
        echo $this->ma->dt_absensi_anggota($karyawan_id);
	}

    // Get Chart Absensi peribadi per bulan
    public function getChartAbsenTahunPribadi()
    {
        $data=  [];
        $karyawan_id = $this->session->userdata('id');
        $tahun = $this->input->post('tahun'); 
        if (!$tahun) {
            $tahun = date('Y');
        }       
       
    //    $bulan = [0,0,0,0,0,0,0,0,0,0,0,0];
    //    // Total absen keseluruhan 
    //    $d = $this->ma->getAbsenMonth($tahun,null,$karyawan_id);
    //    foreach ($d->result() as $k => $v) {
    //         $bulan[(float)$v->bulan - 1] = (float)$v->jml;
    //    }

    //    array_push($data, [
    //        'nama' => 'Total',
    //        'value' => array_values($bulan)
    //    ]);

       // Total absen tepat waktu
       $bulan = [0,0,0,0,0,0,0,0,0,0,0,0];
       $d = $this->ma->getAbsenMonth($tahun,'TW',$karyawan_id);
       foreach ($d->result() as $k => $v) {
            $bulan[(float)$v->bulan - 1] = (float)$v->jml;
       }

       array_push($data, [
           'nama' => 'Tepat Waktu',
           'value' => array_values($bulan)
       ]);

       // Total absen telat
       $bulan = [0,0,0,0,0,0,0,0,0,0,0,0];
       $d = $this->ma->getAbsenMonth($tahun,'TLT',$karyawan_id);
       foreach ($d->result() as $k => $v) {
            $bulan[(float)$v->bulan - 1] = (float)$v->jml;
       }

       array_push($data, [
           'nama' => 'Telat',
           'value' => array_values($bulan)
       ]);

       // Total absen karena cuti
       $bulan = [0,0,0,0,0,0,0,0,0,0,0,0];
       $d = $this->ma->getAbsenMonth($tahun,'CTI',$karyawan_id);
       foreach ($d->result() as $k => $v) {
            $bulan[(float)$v->bulan - 1] = (float)$v->jml;
       }

       array_push($data, [
           'nama' => 'Cuti',
           'value' => array_values($bulan)
       ]);

       echo json_encode($data);
    }

    // Get Chart Absensi karyawan per bulan
    public function getChartAbsenTahunKaryawan()
    {
        $data=  [];
        $tahun = $this->input->post('tahun'); 
        if (!$tahun) {
            $tahun = date('Y');
        }       
       
    //    $bulan = [0,0,0,0,0,0,0,0,0,0,0,0];
    //    // Total absen keseluruhan 
    //    $d = $this->ma->getAbsenMonth($tahun,null);
    //    foreach ($d->result() as $k => $v) {
    //         $bulan[(float)$v->bulan - 1] = (float)$v->jml;
    //    }

    //    array_push($data, [
    //        'nama' => 'Total',
    //        'value' => array_values($bulan)
    //    ]);

       // Total absen tepat waktu
       $bulan = [0,0,0,0,0,0,0,0,0,0,0,0];
       $d = $this->ma->getAbsenMonth($tahun,'TW');
       foreach ($d->result() as $k => $v) {
            $bulan[(float)$v->bulan - 1] = (float)$v->jml;
       }

       array_push($data, [
           'nama' => 'Tepat Waktu',
           'value' => array_values($bulan)
       ]);

       // Total absen telat
       $bulan = [0,0,0,0,0,0,0,0,0,0,0,0];
       $d = $this->ma->getAbsenMonth($tahun,'TLT');
       foreach ($d->result() as $k => $v) {
            $bulan[(float)$v->bulan - 1] = (float)$v->jml;
       }

       array_push($data, [
           'nama' => 'Telat',
           'value' => array_values($bulan)
       ]);

       // Total absen karena cuti
       $bulan = [0,0,0,0,0,0,0,0,0,0,0,0];
       $d = $this->ma->getAbsenMonth($tahun,'CTI');
       foreach ($d->result() as $k => $v) {
            $bulan[(float)$v->bulan - 1] = (float)$v->jml;
       }

       array_push($data, [
           'nama' => 'Cuti',
           'value' => array_values($bulan)
       ]);

       echo json_encode($data);
    }

    // Get Chart Absensi anggota per bulan
    public function getChartAbsenTahunAnggota()
    {
        $data=  [];
        $tahun = $this->input->post('tahun'); 
        $karyawan_id = $this->session->userdata('id');
        if (!$tahun) {
            $tahun = date('Y');
        }       
       
    //    $bulan = [0,0,0,0,0,0,0,0,0,0,0,0];
    //    // Total absen keseluruhan 
    //    $d = $this->ma->getAbsenMonth($tahun,null,$karyawan_id,$leader=true);
    //    foreach ($d->result() as $k => $v) {
    //         $bulan[(float)$v->bulan - 1] = (float)$v->jml;
    //    }

    //    array_push($data, [
    //        'nama' => 'Total',
    //        'value' => array_values($bulan)
    //    ]);

       // Total absen tepat waktu
       $bulan = [0,0,0,0,0,0,0,0,0,0,0,0];
       $d = $this->ma->getAbsenMonth($tahun,'TW',$karyawan_id,$leader=true);
       foreach ($d->result() as $k => $v) {
            $bulan[(float)$v->bulan - 1] = (float)$v->jml;
       }

       array_push($data, [
           'nama' => 'Tepat Waktu',
           'value' => array_values($bulan)
       ]);

       // Total absen telat
       $bulan = [0,0,0,0,0,0,0,0,0,0,0,0];
       $d = $this->ma->getAbsenMonth($tahun,'TLT',$karyawan_id,$leader=true);
       foreach ($d->result() as $k => $v) {
            $bulan[(float)$v->bulan - 1] = (float)$v->jml;
       }

       array_push($data, [
           'nama' => 'Telat',
           'value' => array_values($bulan)
       ]);

       // Total absen karena cuti
       $bulan = [0,0,0,0,0,0,0,0,0,0,0,0];
       $d = $this->ma->getAbsenMonth($tahun,'CTI',$karyawan_id,$leader=true);
       foreach ($d->result() as $k => $v) {
            $bulan[(float)$v->bulan - 1] = (float)$v->jml;
       }

       array_push($data, [
           'nama' => 'Cuti',
           'value' => array_values($bulan)
       ]);

       echo json_encode($data);
    }
}
