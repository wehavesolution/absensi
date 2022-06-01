<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Integrasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MAbsensi','ma');
    }
    
     // Aksi untuk melakukan absen masuk
     public function setAbsenMasuk($karyawan_id="",$jam_masuk="",$tanggal="")
     {
         $q = $this->ma->setMasuk($karyawan_id,$jam_masuk,[
             'online' => 0,
             'ctdtime' => $jam_masuk,
             'ctddate' => $tanggal
         ]);

         return $q;
     }
 
     // Aksi untuk melakukan absen pulang
     public function setAbsenPulang($karyawan_id="",$jam_pulang="",$tanggal="")
     {
         $q = $this->ma->setKeluar($karyawan_id,$jam_pulang,[
             'online' => 0,
             'ctdtime' => $jam_pulang,
             'ctddate' => $tanggal
         ]);

         return $q;
     }
 

    // Simpan Absensi dari mesin offline
    public function saveAbsensi()
    {
        $json = file_get_contents('php://input');
        $json = json_decode($json);
        foreach ($json->data as $v) {
            if ($v->status_absensi == "I") {
                $this->setAbsenMasuk($v->karyawan_id, $v->jam, $v->tanggal);
            }else if($v->status_absensi == "O") {
                $this->setAbsenPulang($v->karyawan_id, $v->jam, $v->tanggal);
            }
        }

        $rsp = [
            'data' => $json->data,
            'status' => true,
            'msg' => "Berhasil mengirim data absensi"
        ];

        echo json_encode($rsp);
    }


    // Test Absensi dari mesin offline
    public function testAbsensi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "http://localhost/absensi/Api/saveAbsensi",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\n\t\"id\" : 1\n}",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: application/json",
            "postman-token: 0b0e6f41-e5de-0c62-3404-ad5ddf2eaea7"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}