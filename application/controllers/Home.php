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
		$this->form_validation->set_rules('perusahaan_email', 'Email', 'is_unique[_perusahaan.perusahaan_email]');
		$this->form_validation->set_message("is_unique", "%s yang sama sudah terdaftar. <b>Silahkan Login !</b>");

		if ($this->form_validation->run() == TRUE) {
			$input	= $this->input->post();
			$input['perusahaan_user']	= $this->input->post('perusahaan_email');
			$input['perusahaan_password'] = md5(md5($this->input->post('perusahaan_password')));
			$this->Mperusahaan->register($input);
			$data['success'] = 'Pendaftaran Berhasil, Silahkan Login disini !';
		}
		else
		{
			$data['failed'] = validation_errors();
		}

		$this->load->view("frontend/index",$data);
	}

}
?>