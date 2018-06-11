<?php

class Home extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mperusahaan');
		$this->load->model('Mkaryawan');
		$this->load->model('Mabsensi');
		if (!$this->session->userdata('user'))
		{
			$log = base_url("mastercms");
			echo "<script>location='$log';</script>";
		}
	}

	function index(){
		$data['perusahaan']	= $this->Mperusahaan->get_data();
		// $getPerusahaan	= $this->Mperusahaan->get_data();
		$array_series = array(array('data'=>array()));
		$array_datas = array();
		$getAbsensi		= $this->Mabsensi->get_data();

		echo "<pre>";
			print_r($getAbsensi);
			echo "</pre>";

		// foreach ($getPerusahaan as $key => $p) {
		// 	foreach ($getAbsensi as $key => $a) {
		// 		if ($a['lokasi_id']==intval($getAbsensi[$key]['lokasi_id'])) {
		// 				$array_datas[$getAbsensi[$key]['lokasi_id']] = intval($getAbsensi[$key]['lokasi_id']);
		// 				$array_datas[$getAbsensi[$key]['status']] = intval($getAbsensi[$key]['jumlah']);
		// 			// $i=0;
		// 			// while($i < count($getAbsensi)){
		// 			// 	$i++;

						// echo "<pre>";
						// print_r($data['perusahaan']);
						// echo "</pre>";
		// 			// }
		// 		}
		// 	}
		// // }


			$data['absen'] = json_encode($getAbsensi);

		// foreach ($getAbsensi as $key => $val) {
		// 	// for ($i=0; $i < count($getAbsensi) ; $i++) { 
		// 	// 	# code...
		// 	// }

		// 	array_push($array_series[0]['data'], array((string)$key, $val));
		// 	// $dataAbsen = array(
		// 	// 	'lokasi_id' => $val['lokasi_id'],
		// 	// 	'status' => $val['status'],
		// 	// 	'jumlah' => $val['jumlah'],
		// 	// );
			// echo "<pre>";
			// print_r($data['absen']);
			// echo "</pre>";
		// }

		$data['totalkaryawan']	= count($this->Mkaryawan->tampil());
		$this->render_page('backend/home', $data);
	}
	
}

?>