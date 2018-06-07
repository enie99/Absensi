<?php
/**
* 
*/
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mperusahaan');
	}
	function index()
	{
		if ($this->input->post()) {
			$input	= $this->input->post();
			$input['password_perusahaan'] = md5(md5($this->input->post('password_perusahaan')));

			$this->Mperusahaan->register($input);
		}

		$this->load->view("frontend/index");
	}

}
?>