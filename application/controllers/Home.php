<?php
class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mperusahaan');
		// $this->load->database();
	}
	function index()
	{
		$this->form_validation->set_rules('perusahaan_email', 'Email', 'is_unique[_perusahaan.perusahaan_email]');
		$this->form_validation->set_message("is_unique", "%s yang sama sudah terdaftar. <strong>Silahkan Login. </strong>");

		if ($this->form_validation->run() == TRUE)
		{
			$input	= $this->input->post();
			$input['perusahaan_user']	= $this->input->post('perusahaan_email');
			$input['perusahaan_password'] = md5(md5($this->input->post('perusahaan_password')));
			if ($this->Mperusahaan->register($input)) {
				// send confirm mail
				if($this->Mperusahaan->sendEmail($this->input->post('perusahaan_email'))){
                    $this->session->set_flashdata('msg', '<div class="alert alert-success">Pendaftaran berhasil.<br/>Silahkan konfirmasi melalui pesan yang kami kirim ke email Anda. </div>');
                     redirect(base_url());
                }else{
                   $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Gagal!! Silahkan coba kembali.</div>');
                    redirect(base_url());
                }
			}
		}
		else
		{
			$data['failed'] = validation_errors();
			$this->load->view("frontend/index",$data);
		}

	}

	function confirmEmail($hashcode){
        if($this->Mperusahaan->verifyEmail($hashcode)){
            $this->session->set_flashdata('verify', '<div class="alert alert-success">Konfirmasi email <strong>berhasil</strong>. Silahkan Login.</div>');
            redirect('mastercms');
        }else{
            $this->session->set_flashdata('verify', '<div class="alert alert-danger">Konfirmasi email <strong>gagal</strong>. Silahkan register kembali.</div>');
            redirect('mastercms');
        }
    }



}
?>