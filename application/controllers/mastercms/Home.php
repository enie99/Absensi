<?php

class Home extends MY_Controller
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

	function index(){
		$data['angka'] = '1000000';
		// $this->session->sess_destroy();
		$this->render_page('backend/home', $data);
	}
	
}

?>