<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if (!$this->session->userdata('nip')) {
			$this->session->set_flashdata('false', 'Maaf anda tidak dapat mengakses halaman tersebut, silahkan login untuk melanjutkan!');
			redirect('/');
		}
        $this->load->model('MPengajuan','mp');
        $this->load->model('MNotif','mn');
        $this->load->model('MKaryawan','mk');
        $this->load->model('MKetAbsensi','mketabsen');
	}

    // Aksi untuk melakukan pengajuan
    public function kirimPengajuan()
    {

// $begin = new DateTime('2022-04-25');
// $end = new DateTime('2022-05-01');
// $end->add(new DateInterval('P1D'));

// $interval = DateInterval::createFromDateString('+1 day');
// $period = new DatePeriod($begin, $interval, $end);

// foreach ($period as $dt) {
//     echo $dt->format("Y-m-d").'<br>';
// }
// die;
        $karyawan_id = $this->session->userdata('id');
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $keterangan = $this->input->post('keterangan');
        $status_pengajuan = $this->input->post('status_pengajuan');
        

        $obj = [
            'karyawan_id' => $karyawan_id,
            'tgl_mulai' => $tgl_mulai,
            'tgl_akhir' => $tgl_akhir,
            'keterangan' => $keterangan,
            'status_pengajuan' => $status_pengajuan
        ];
        
        $q = $this->mp->kirimPengajuan($obj);

        // Mengambil informasi karyawan yg melakukan pengajuan
        $karyawan = $this->mk->getKaryawan($karyawan_id);
        $karyawan = $karyawan->num_rows() > 0 ? $karyawan->row() : false;

        // Menerjemahkan kode status_pengajuan agar dapat dibaca
        $v_status_pengajuan = $this->mketabsen->getKetAbsensi($status_pengajuan);

        // Mengambil keterangan
        $keterangan_status_pengajuan = $v_status_pengajuan ? $v_status_pengajuan->row()->keterangan : '';

        // Mengambil link dinamis menyesuikan dengan status_pengajuan
        $_link = $v_status_pengajuan ? $v_status_pengajuan->row()->link : '';

        // Kirim Notifikasi jika pengajuan berhasil di simpan pada database
        if ($q[0] && $karyawan) {
            // Ambil id karyawan hrd
            $hrd = $this->mk->getHRDKaryawan();
            $hrd_id = $hrd->num_rows() > 0 ? $hrd->row()->id : null;
            if ($hrd_id) {
                // Kirim notifikasi ke hrd
                $dari           = $karyawan_id;
                $kepada         = $hrd_id;
                $msg            = $karyawan->nama.' telah mengirimkan pengajuan izin '.$keterangan_status_pengajuan;
                $action_id      = $q[2];
                $link           = $_link.$action_id;
                $kode_action    = $status_pengajuan;
                $this->mn->kirimNotif($dari,$kepada,$msg,$action_id,$link,$kode_action);
            }

            // Ambil id karyawan leader
            $leader = $this->mk->getLeaderKaryawan($karyawan_id);
            $leader_id = $leader->num_rows() > 0 ? $leader->row()->id : null;
            if ($leader_id) {
                // Kirim notifikasi ke leader
                $dari           = $karyawan_id;
                $kepada         = $leader_id;
                $msg            = $karyawan->nama.' telah mengirimkan pengajuan izin '.$keterangan_status_pengajuan;
                $action_id      = $q[2];
                $link           = $_link.$action_id;
                $kode_action    = $status_pengajuan;
                $this->mn->kirimNotif($dari,$kepada,$msg,$action_id,$link,$kode_action);
            }
        }

        // Response dalam bentuk json
        $rsp['status'] = $q[0];
        $rsp['msg'] = $q[1];

        echo json_encode($rsp);
    }

    public function dt_pengajuan_personal()
    {
        $karyawan_id =  $this->session->userdata('id');
        echo $this->mp->dt_pengajuan_personal($karyawan_id);
    }

    public function tindaklanjutiPengajuan()
    {
        $rsp = [
            'status' => false,
            'msg' => 'Gagal menindaklanjuti pengajuan'
        ];

        $pengajuan_id = $this->input->post('pengajuan_id');

        $accept = $this->input->post('accept');
        $ket = $this->input->post('keterangan');
        $ctdby = $this->input->post('ctdby');
        $accpetBy = $this->session->userdata('id');
        $acceptNum = null;

        if ($this->session->userdata('id') == $ctdby && $accept != "3") {
            echo json_encode($rsp);
            die;
        }
        
        $kar = $this->aut_mk->getKaryawan($this->session->userdata('id'));
        if ($kar->num_rows() > 0) {
            $acceptNum = $kar->row()->tbl_jabatan_id == "3" ? '2' : null;
        }

        $lead = $this->aut_mk->getLeaderKaryawan($ctdby);
        if ($lead->num_rows() > 0) {
            $acceptNum = $lead->row()->id == $this->session->userdata('id') ? '1' : null;
        }

        $terima_pengajuan = $this->mp->upPengajuan([
            'diterima' =>  $accept
        ]);

        if ($terima_pengajuan) {
            $terima_act_pengajuan = $this->mp->inActPengajuan(
                [
                    'pengajuan_id' => $pengajuan_id,
                    'approve_id' => $this->session->userdata('id'),
                    'status_action' =>  $accept
                ]
            );
            if ($terima_act_pengajuan) {
                $data_log = [
                    'pengajuan_id' => $pengajuan_id,
                    'msg' => $ket,
                    'ctdby' => $this->session->userdata('id'),
                    'accept' => $accept,
                    'acceptBy' => $accpetBy,
                    'acceptNum' => $acceptNum,
                    'acceptNote' => $ket,
                    'ctddate' => date('Y-m-d'),
                    'ctdtime' => date('H:i:s'),
                ];
                $this->mp->inLogPengajuan($data_log);

                //  Mengambil detail pengajuan
                 $pengajuan = $this->mp->getPengajuan(['p.id' => $pengajuan_id]);
                 $pengajuan = $pengajuan->num_rows() > 0 ? $pengajuan->row() : false;

                 // Menerjemahkan kode status_pengajuan agar dapat dibaca
                $v_status_pengajuan = $this->mketabsen->getKetAbsensi($pengajuan->status_pengajuan);

                // Mengambil link dinamis menyesuikan dengan status_pengajuan
                $_link = $v_status_pengajuan ? $v_status_pengajuan->row()->link : '';

                $data_log['ket_pengajuan'] = $ket;

                if ($accept != "3") {
                    // Kirim notifikasi ke pengaju
                    $dari           = $this->session->userdata('id');
                    $kepada         = $ctdby;
                    $msg            = $this->mp->msg_log_pengajuan((object)$data_log);
                    $action_id      = $pengajuan_id;
                    $link           = $_link.$action_id;
                    $kode_action    = $pengajuan->status_pengajuan;
                    $this->mn->kirimNotif($dari,$kepada,$msg,$action_id,$link,$kode_action);
                }

               
                if ($acceptNum == "1" || $accept == "3") { //kalau peresponnya itu leader kirim notif juga ke hrd
                    // Ambil id karyawan hrd
                    $hrd = $this->mk->getHRDKaryawan();
                    $hrd_id = $hrd->num_rows() > 0 ? $hrd->row()->id : null;
                    if ($hrd_id) {
                        // Kirim notifikasi ke hrd
                        $dari           = $this->session->userdata('id');
                        $kepada         = $hrd_id;
                        $msg            = $this->mp->msg_log_pengajuan((object) $data_log);
                        $action_id      = $pengajuan_id;
                        $link           = $_link.$action_id;
                        $kode_action    = $pengajuan->status_pengajuan;
                        $this->mn->kirimNotif($dari,$kepada,$msg,$action_id,$link,$kode_action);
                    }
                }

                if ($acceptNum == "2" || $accept == "3") {
                    // Ambil id karyawan leader
                    $leader = $this->mk->getLeaderKaryawan($ctdby);
                    $leader_id = $leader->num_rows() > 0 ? $leader->row()->id : null;
                    if ($leader_id) {
                        // Kirim notifikasi ke leader
                        $dari           = $this->session->userdata('id');
                        $kepada         = $leader_id;
                        $msg            = $this->mp->msg_log_pengajuan((object) $data_log);
                        $action_id      = $pengajuan_id;
                        $link           = $_link.$action_id;
                        $kode_action    = $pengajuan->status_pengajuan;
                        $this->mn->kirimNotif($dari,$kepada,$msg,$action_id,$link,$kode_action);
                    }
                }

                $rsp['status'] = true;
                $rsp['msg'] = "Berhasil meindaklanjuti pengajuan";
                echo json_encode($rsp);
                die;
            }
        }

        echo json_encode($rsp);

    }

}
