
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
		$getPerusahaan	= $this->Mperusahaan->get_data();
		$data['perusahaan']	= $getPerusahaan;
		$array_datas = array();
		$getAbsensi		= $this->Mabsensi->get_data();

		foreach ($getPerusahaan as $key) {
			$array_datas[$key['lokasi_id']]['ijin'] = array('ijin', 0);
			$array_datas[$key['lokasi_id']]['masuk kerja'] = array('masuk kerja', 0);
			$array_datas[$key['lokasi_id']]['terlambat'] = array('terlambat', 0);
			$array_datas[$key['lokasi_id']]['sakit'] = array('sakit', 0);
			$array_datas[$key['lokasi_id']]['cuti'] = array('cuti', 0);
		}

		foreach ($getAbsensi as $key => $value) {
			$array_datas[$value['lokasi_id']][$value['status']] = array(
				$value['status'],
				intval($value['jumlah'])
			);
		}
		foreach ($array_datas as $key => $value) {
			$array_data[$key][] = $array_datas[$key]['ijin'];
			$array_data[$key][] = $array_datas[$key]['masuk kerja'];
			$array_data[$key][] = $array_datas[$key]['terlambat'];
			$array_data[$key][] = $array_datas[$key]['sakit'];
			$array_data[$key][] = $array_datas[$key]['cuti'];
		}

		$data['absen'] = $array_data;

		$data['totalkaryawan']	= count($this->Mkaryawan->tampil());
		$this->render_page('backend/home', $data);
	}
	
}

?>