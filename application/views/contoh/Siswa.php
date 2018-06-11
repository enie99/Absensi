<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('siswa_model','siswa');

	}

	public function index()
	{
		$array_kategori = array('JUMLAH SISWA SD TRITUNGGAL');

		$array_series = array(array('name'=>'JUMLAH SISWA SD TRITUNGGAL', 'data'=>array()));

		$array_datas = array();

		$data_siswa = $this->siswa->getjumlahsiswa();

		$i=0;
		while($i < count($data_siswa)){
			$array_datas[$data_siswa[$i]['periode']] = intval($data_siswa[$i]['total']);
			$i++;
		}

		// set value per data grafik
		foreach($array_datas as $key=>$val){
			array_push($array_series[0]['data'], array((string)$key, $val));
		// echo "<pre>";
		// print_r($data['array_series']);
		// echo "</pre>";
		}

		$data['array_kategori'] = json_encode($array_kategori);

		$data['array_series'] = json_encode($array_series);
		$this->load->view('dashboard_pie_view',$data);
	}
}