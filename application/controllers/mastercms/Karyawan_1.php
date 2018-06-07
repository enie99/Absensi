<?php
/**
 * 
 */
class Karyawan extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		
		if (!$this->session->userdata('user'))
		{
			$log = base_url("mastercms");
			echo "<script>location='$log';</script>";
		}
	}

	function index()
	{
		$this->render_page('backend/karyawan/tampil');
	}

	function add()
	{
		$this->render_page('backend/karyawan/tambah');
	}

	function detail()
	{
		$this->render_page('backend/karyawan/detail');
	}
}
?>