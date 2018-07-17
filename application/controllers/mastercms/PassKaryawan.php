<?php 
/**
 * 
 */
class PassKaryawan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Mkaryawan');
	}

	function index()
    {
      $email = $_GET['email'];

      if ($this->input->post()) {
        $pass = $this->input->post('password');
        $input['karyawan_password'] = md5(md5($pass));

        $cek_status = $this->Mkaryawan->set_password_karyawan($email, $input);
        	if ($cek_status == "berhasil") {
        		$this->session->set_flashdata('msg', '<div class="alert alert-success">Selamat! Anda telah terdaftar di sistem presensi perusahaan. Anda dapat login dengan aplikasi menggunakan email dan password yang telah didaftarkan.</div>');
        		$this->Mkaryawan->email_konfirmasi($email);
        	}

      }

      $this->load->view('backend/set_password');
    }

}
?>