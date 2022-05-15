<?php

if (!function_exists('per_diagram_lingkaran')) {
	function per_diagram_lingkaran($jml_all = 0, $jml_bagi = 0)
	{
		$satu_per = (1 / 100);
		$total_data = $jml_all;
		$jml_data = $jml_bagi;
		$proses_1 = $total_data * $satu_per;
		$total = $jml_data / $proses_1;
		return round($total, 1);
	}
}

if (!function_exists('generateRandomString')) {
	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}

if (!function_exists('persen_nt')) {
	function persen_nt($awal = 0, $akhir = 0)
	{ //persen naik/turun
		$awal = (float)$awal;
		$akhir = (float)$akhir;
		if ($awal > $akhir) { // persen turun
			$h1 = ($awal - $akhir) / $awal;
			if ($h1 == 0) {
				return 0;
			}
			$h2 = $h1 * 100;
			return [round($h2, 1), 'turun'];
		} else { //persen naik
			$selisih = $akhir - $awal;
			if ($selisih == 0) {
				return 0;
			}

			if ($awal == 0) {
				return [100, 'naik'];
			}

			@$h = $selisih / $awal;
			$xx = $h * 100;
			return [round($xx, 1), 'naik'];
		}
	}
}

if (!function_exists('kordinat')) {
	function kordinat($kordinat = '')
	{ //persen naik/turun
		$k = explode(',', $kordinat);
		return  [@(float)$k[0], @(float)$k[1]];
	}
}

if (!function_exists('rumus_cfr')) {
	function rumus_cfr($md = '', $laka_lantas = '')
	{ //persen naik/turun
		return round($md / $laka_lantas * 100, 2);
	}
}

if (!function_exists('get_date')) {
	function get_date($date='',$name="")
	{ 
		$date = explode('-',$date);
		if($name == "tahun") return $date[0];
		if($name == "bulan") return $date[1];
		if($name == "tanggal"){
			$tgl = $date[2];
			if(strlen($tgl) == 1) $tgl = '0'.$tgl;
			return $tgl;
		}
	}
}

if (!function_exists('tgl_indo')) {
	function tgl_indo($tanggal)
	{
		$bulan = array(
			1 => 'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$tgl = explode(' ', $tanggal);
		$pecahkan = explode('-', $tgl[0]);

		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun

		return @$pecahkan[2] . ' ' . @$bulan[(int)$pecahkan[1]] . ' ' . @$pecahkan[0];
	}
}

if (!function_exists('torp')) {
	function torp($v)
	{
		$rp =  @stripos($v, ',') ? $v  : @number_format($v, 0, ',', ',');
		return 'Rp ' . $rp;
	}
}
if (!function_exists('jumlah')) {
	function jumlah($v)
	{
		if ($v) {
			$jumlah =  @stripos($v, ',') ? $v  : @number_format($v, 0, ',', ',');
			return $jumlah;
		}
	}
}

if (!function_exists('redenominasi')) {
	function redenominasi($labelValue = 0)
	{
		if (abs(floatval($labelValue)) >= 1.0e+9) {
			return round((abs(floatval($labelValue)) / 1.0e+9), 2) . " M";
		} else if (abs(floatval($labelValue)) >= 1.0e+6) {
			return round((abs(floatval($labelValue)) / 1.0e+6), 2) . " JT";
		} else if (abs(floatval($labelValue)) >= 1.0e+3) {
			return round((abs(floatval($labelValue)) / 1.0e+3), 2) . " K";
		} else {
			return round(abs(floatval($labelValue)), 2);
		}
	}
}

if (!function_exists('bulan')) {
	function bulan($v = '')
	{
		$bulan = [
			1 => 'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		];
		return @$bulan[$v];
	}
}

if (!function_exists('data_to_array')) {
	function data_to_array($fungsi, $filter = "", $by = [])
	{
		if ($filter != "all") {
			$by = [1 => 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
		}
		foreach ($fungsi as $v) {
			if ($filter != "all") {
				$by[$v->bulan] = redenominasi($v->jml);
			} else {
				if (array_key_exists($v->tahun, $by)) {
					$by[$v->tahun] = redenominasi($v->jml);
				}
			}
		}
		return array_values($by);
	}
}


if (!function_exists('rangeDate')) {
	function rangeDate($start, $end)
	{
		$date = [];
		$period = new DatePeriod(
			new DateTime($start),
			new DateInterval('P1D'),
			new DateTime($end)
		);

		foreach ($period as $key => $value) {
			array_push($date, $value->format('Y-m-d'));
		}

		return $date;
	}
}

if (!function_exists('mingguDepan')) {
	function mingguDepan($n = '1 weeks')
	{
		$minggu_depan = rangeDate(date('Y-m-d'), date('Y-m-d', strtotime($n)));
		return $minggu_depan;
	}
}

if (!function_exists('mingguLalu')) {
	function mingguLalu($n = '-1 weeks')
	{
		$minggu_lalu = rangeDate(date('Y-m-d'), date('Y-m-d', strtotime($n)));
		return $minggu_lalu;
	}
}

// Cek Data
if (!function_exists('cekData')) {
	function cekData($q, $field = '')
	{
		if ($q->num_rows() > 0) {
			return $q->row()->$field;
		} else {
			return 0;
		}
	}
}

if (!function_exists('srlen')) {
	function srlen($n = '')
	{
		$x = str_replace([0, 1, 2, 3, 4, 5, 6, 7, 8, 9], ['z%', 'x$', 'j#', 'k!', 'i`', 'u&', 'b*', 'a(', 'c)', 'f_'], $n);
		$okz = base64_encode($x);
		return $okz;
	}
}

if (!function_exists('srlde')) {
	function srlde($okj = '')
	{
		$nama = base64_decode($okj);
		$x = str_replace(['z%', 'x$', 'j#', 'k!', 'i`', 'u&', 'b*', 'a(', 'c)', 'f_'], [0, 1, 2, 3, 4, 5, 6, 7, 8, 9], $nama);
		return $x;
	}
}

if (!function_exists('setStatus')) {
	function setStatus($s = '')
	{
		if ($s == 0) return "Tidak Aktif";
		if ($s == 1) return "Aktif";
	}
}

if (!function_exists('statusPerson')) {
	function statusPerson($s = '')
	{
		if ($s == 'N') return "Tidak Aktif";
		if ($s == 'Y') return "Aktif";
	}
}

if (!function_exists('calcHours')) {
	function calcHours($startdate, $enddate)
	{
		$datetime1 = new DateTime($startdate);
		$datetime2 = new DateTime($enddate);
		$interval = $datetime1->diff($datetime2);
		$elapsed = $interval->format('%y years %m months %a days %h hours %i minutes %s seconds');
		return $elapsed;
	}
}

if (!function_exists('calc_minute')) {
	function calc_minute($startdate, $enddate)
	{
		$to_time = strtotime($enddate);
		$from_time = strtotime($startdate);
		// return round(abs($to_time - $from_time) / 60,2);
		$menit = round(abs($to_time - $from_time) / 60, 2);
		return $menit * 60;
	}
}

if (!function_exists('response_json')) {
	function response_json($output, $data)
	{
		$ret = array(
			'status' => 200,
			'values' => $data
		);
		$output->set_content_type('application/json')->set_output(json_encode($ret));
	}
}
if (!function_exists(("bt_pagination"))) {
	function bt_pagination($post)
	{
		$search = $post->post('search');
		$sort = $post->post('sort');
		$order = $post->post('order');
		$search = $post->post('search');
		$offset = $post->post('offset');
		$limit = $post->post('limit');
		$s = isset($search) ? $search : "";
		$l = isset($limit) ? (int)($limit) : 10;
		if ($l < 1) $limit = 1;
		$page = isset($offset) ? (int)($offset) : 0;
		if ($page < 0)
			$page = 0;
		$s = isset($sort) ? $sort : null;
		$o = isset($order) ? $order : "ASC";
		$sorting = "";
		if (isset($s)) {
			$sorting = "ORDER BY ".$s . " " . $o;
		}
		return array("limit" => $l, "page" => $page, "search" => $s, "sort" => $sorting);
	}
}
if (!function_exists('secondstoTime')) {
	function secondsToTime($durasi) {
        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$durasi");
        // print_r($dtF->diff($dtT));die();
        if ($dtF->diff($dtT)->format('%a') && $dtF->diff($dtT)->format('%h') && $dtF->diff($dtT)->format('%i') && $dtF->diff($dtT)->format('%s') != 0) {
            return $dtF->diff($dtT)->format('%a hari %h jam %i menit %s detik');
        }
        else if ($dtF->diff($dtT)->format('%a') && $dtF->diff($dtT)->format('%h') && $dtF->diff($dtT)->format('%i') != 0) {
            return $dtF->diff($dtT)->format('%a hari %h jam %i menit');
        }
        else if ($dtF->diff($dtT)->format('%a') && $dtF->diff($dtT)->format('%h') && $dtF->diff($dtT)->format('%s') != 0) {
            return $dtF->diff($dtT)->format('%a hari %h jam %s detik');
        }
        else if ($dtF->diff($dtT)->format('%a') && $dtF->diff($dtT)->format('%h') != 0) {
            return $dtF->diff($dtT)->format('%a hari %h jam');
        }
        else if ($dtF->diff($dtT)->format('%a') && $dtF->diff($dtT)->format('%i') && $dtF->diff($dtT)->format('%s') != 0) {
            return $dtF->diff($dtT)->format('%a hari %i menit %s detik');
        }
        else if ($dtF->diff($dtT)->format('%a') && $dtF->diff($dtT)->format('%i') != 0) {
            return $dtF->diff($dtT)->format('%a hari %i menit');
        }
        else if ($dtF->diff($dtT)->format('%a') && $dtF->diff($dtT)->format('%s') != 0) {
            return $dtF->diff($dtT)->format('%a hari %s detik');
        }
        else if ($dtF->diff($dtT)->format('%h') && $dtF->diff($dtT)->format('%i') && $dtF->diff($dtT)->format('%s') != 0) {
            return $dtF->diff($dtT)->format('%h jam %i menit %s detik');
        }
        else if ($dtF->diff($dtT)->format('%h') && $dtF->diff($dtT)->format('%s') != 0) {
            return $dtF->diff($dtT)->format('%h jam %s detik');
        }
        else if ($dtF->diff($dtT)->format('%h') && $dtF->diff($dtT)->format('%i') != 0) {
            return $dtF->diff($dtT)->format('%h jam %i menit');
        }
        else if ($dtF->diff($dtT)->format('%s') && $dtF->diff($dtT)->format('%i') != 0) {
            return $dtF->diff($dtT)->format('%i menit %s detik');
        }
        else if ($dtF->diff($dtT)->format('%s') != 0) {
            return $dtF->diff($dtT)->format('%s detik');
        }
        else if ($dtF->diff($dtT)->format('%i') != 0) {
            return $dtF->diff($dtT)->format('%i menit');
        }
        else if ($dtF->diff($dtT)->format('%h') != 0) {
            return $dtF->diff($dtT)->format('%h jam');
        }
        else if ($dtF->diff($dtT)->format('%a') != 0) {
            return $dtF->diff($dtT)->format('%a hari');
        }
    }
}

if (!function_exists("array_key_last")) {
    function array_key_last($array) {
        if (!is_array($array) || empty($array)) {
            return NULL;
        }
       
        return array_keys($array)[count($array)-1];
    }
}

if (!function_exists('comboopts')){
	function comboopts($arrobj){
		$ret=array();
		foreach($arrobj as $d){
			$ret[$d->v] = $d->t;
		}
		return $ret;
	}
}

if (!function_exists('zero_order')){
	function zero_order($str,$num=2){
		return str_pad($str,$num,"0",STR_PAD_LEFT);
	}
}

if (!function_exists('time_indo')){
	function time_indo($str=''){
		$x = explode(":",$str);
		return $x[0].":".$x[1];
	}
}
