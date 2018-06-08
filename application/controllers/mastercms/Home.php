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
		$data['angka']	= '1000000';
		$id = $_SESSION['user']['perusahaan_id'];
		$data['perusahaan']		= $this->Mperusahaan->get_cabang($id);
		$data['absensi']		= $this->Mabsensi->tampil($id);

		echo "<pre>";
		print_r($data['absensi']);
		echo "</pre>";

		$data['totalcabang']	= count($data['perusahaan']);
		$data['totalkaryawan']	= count($this->Mkaryawan->tampil());
		$this->render_page('backend/home', $data);
	}
	
}

?>