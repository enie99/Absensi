<?php
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
			$input['perusahaan_user']	= $this->input->post('perusahaan_email');
			$input['perusahaan_password'] = md5(md5($this->input->post('perusahaan_password')));
			$this->Mperusahaan->register($input);
		}
		$this->load->view("frontend/index");
	}

}
?>