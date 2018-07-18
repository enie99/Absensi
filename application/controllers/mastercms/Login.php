<?php
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mperusahaan');
	}
	function index()
	{
		$data['hasil'] ="";
		$data['title'] = 'Absensi';
		$data = array(
			'captcha' => $this->recaptcha->getWidget(),
            'script_captcha' => $this->recaptcha->getScriptTag(), // javascript recaptcha ditaruh di head
        );

		$this->form_validation->set_rules('AdmUsr', ' ', 'trim|required');
		$this->form_validation->set_rules('AdmPswd', ' ', 'trim|required');

		$recaptcha = $this->input->post('g-recaptcha-response');
		$response = $this->recaptcha->verifyResponse($recaptcha);

		if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
			$data['hasil'] = "";
		} else {
			$cek = $this->Mperusahaan->auth($this->input->post());
			if ($cek=='berhasil') {
				$data['hasil'] = "berhasil";
			}
			else
			{
				$data['hasil'] = "gagal";
				$this->session->set_flashdata('msg', '<div class="alert alert-block alert-danger fade in"><button type="button" class="close close-sm" data-dismiss="alert"><i class="fa fa-times"></i></button><i class="fa fa-warning"></i>&nbsp;&nbsp;Upss. Email atau Password salah.</div>');
			}
		}

		$this->load->view('backend/login',$data);
	}
	function logout()
	{
		$user_data = $this->session->all_userdata();
		foreach ($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
				$this->session->unset_userdata($key);
			}
		}
		$this->session->sess_destroy();
		echo "<script>alert('Anda berhasil logout!');location='".base_url("mastercms")."'</script>";
	}

	function reset_password()
	{
		$receiver = $this->input->post('email');
		if ($this->input->post()) {
			$this->Mperusahaan->sendLinkReset($receiver);
			echo "<script>alert('Link Reset Password Telah dikirim ke Email Anda');location='".base_url("mastercms")."'</script>";
			redirect('mastercms/login');
		}
	}

	function set_password()
	{
		$email = $_GET['receiver'];
		if ($this->input->post())
		{
			$pass = $this->input->post('password');
			$input['perusahaan_password'] = md5(md5($pass));
			$update = $this->Mperusahaan->change_password($email, $input);

			if ($update == "berhasil") {
				$this->session->set_flashdata('msg', '<div class="alert alert-info">Password Berhasil Diubah</div>');
				redirect('mastercms/login');
			}
		}
		$this->load->view('backend/reset_password'); //Form reset password perusahaan
	}
}
?>