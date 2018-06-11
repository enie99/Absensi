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
		$getPerusahaan	= $this->Mperusahaan->get_data();
		$array_series = array(array('data'=>array()));
		$array_datas = array();
		$getAbsensi		= $this->Mabsensi->get_data();

		$i=0;
		while($i < count($getAbsensi)){
			foreach ($getAbsensi as $key => $value) {
				if ($value['lokasi_id'] == $getAbsensi[$i]['lokasi_id']) {
					$array_datas[$getAbsensi[$i]['status']] = intval($getAbsensi[$i]['jumlah']);
				}
			}
			$i++;
		}

		foreach($array_datas as $key=>$val){
			array_push($array_series[0]['data'], array((string)$key, $val));
		}

		$data['absen'] = json_encode($array_series);

		$data['totalkaryawan']	= count($this->Mkaryawan->tampil());
		$this->render_page('backend/home', $data);
	}
	
}

?>