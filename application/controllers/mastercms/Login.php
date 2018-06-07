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
		$data['hasil'] =" ";
		$data['title'] = 'Absensi';
		
		if ($this->input->post()) {
			$cek = $this->Mperusahaan->auth($this->input->post());

			if ($cek=='berhasil') {
				$data['hasil'] = "berhasil";
			}
			else
			{
				$data['hasil'] = "gagal";
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
	    echo "<script>alert('Anda berhasil logout, Good Bye !');location='".base_url("mastercms")."'</script>";
	}
}
?>