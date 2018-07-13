<?php

class Mkaryawan extends CI_Model
{

	function tampil()
	{
		$id = $_SESSION['user']['perusahaan_id'];
		$ambil = $this->db->query("SELECT * FROM _karyawan k 
				LEFT JOIN _lokasi l ON k.lokasi_id = l.lokasi_id
				WHERE l.perusahaan_id = '$id' ");
		return $ambil->result_array();
	}

	function tampil_id($id,$lokasi_id)
	{
		$id = $_SESSION['user']['perusahaan_id'];
		$ambil = $this->db->query("SELECT * FROM _karyawan k 
				RIGHT JOIN _lokasi l ON k.lokasi_id = l.lokasi_id
				WHERE l.perusahaan_id = '$id' AND k.lokasi_id = '$lokasi_id' ");
		return $ambil->result_array();
	}

	function tampil_blog_pagination($batas, $from)
	{
		$id = $_SESSION['user']['perusahaan_id'];
		$this->db->order_by('_karyawan.karyawan_id','DESC');
		$this->db->where('_perusahaan.perusahaan_id', $id);		
		$this->db->join('_lokasi','_lokasi.lokasi_id = _karyawan.lokasi_id');
		$this->db->join('_perusahaan','_perusahaan.perusahaan_id = _lokasi.perusahaan_id');
		$ambil = $this->db->get('_karyawan', $batas, $from);
		return $ambil->result_array();
	}

	function cari($keyword){
		$id = $_SESSION['user']['perusahaan_id'];
		$this->db->like('karyawan_nama', $keyword);
		$this->db->where('_perusahaan.perusahaan_id', $id);		
		$this->db->join('_lokasi','_lokasi.lokasi_id = _karyawan.lokasi_id');
		$this->db->join('_perusahaan','_perusahaan.perusahaan_id = _lokasi.perusahaan_id');
		$ambil = $this->db->get('_karyawan');
		return $ambil->result_array();
	}

	function get_by_id($id)
	{
		$this->db->where('karyawan_id', $id);
		$ambil = $this->db->get('_karyawan');
		return $ambil->row_array();
	}

	function daftar_perusahaan()
	{
		$id = $_SESSION['user']['perusahaan_id'];
		$this->db->where('perusahaan_id',$id);
		$ambil = $this->db->get('_lokasi');
		return $ambil->result_array();
	}

	function tambah($input){
		$input['karyawan_user'] = $input['karyawan_email'];
		$this->db->insert('_karyawan', $input);
		// redirect('mastercms/karyawan', 'refresh');
	}

	function edit($input, $id){
		$this->db->where('karyawan_id', $id);
		$this->db->update('_karyawan', $input);
		redirect('mastercms/karyawan', 'refresh');
	}

	function hapus($id){
		$this->db->where('karyawan_id', $id);
		$this->db->delete('_karyawan');
	}

	function detail($id){
		$this->db->join('_lokasi', '_karyawan.lokasi_id = _lokasi.lokasi_id','right');
		$this->db->where('_karyawan.karyawan_id', $id);
		$data = $this->db->get('_karyawan');
		return $data->row_array();
	}

	function sendEmail($receiver){
		$from = "hilo73ch@gmail.com";    //senders email address
        $subject = 'Buat Password Presensi';  //email subject

        $message = '<h3>Selamat Datang Karyawan . . .</h3>
	<p>Silahkan mengatur password anda untuk dapat menggunakan sistem presensi perusahaan</p>
	<button style="background-color:#5187c0;">Setting Password</button>';
        
	    
        
        //config email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = $from;
        $config['smtp_pass'] = 'sismart16';  //sender's password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = 'TRUE';
        $config['newline'] = "\r\n"; 
        
        $this->load->library('email', $config);
		$this->email->initialize($config);
        //send email
        $this->email->from($from);
        $this->email->to($receiver);
        $this->email->subject($subject);
        $this->email->message($message);
        
        if($this->email->send()){
            //for testing
            echo "sent to: ".$receiver."<br>";
            echo "from: ".$from. "<br>";
            echo "protocol: ". $config['protocol']."<br>";
            echo "message: ".$message;
            return true;
        }else{
            echo "email send failed";
            echo $this->email->print_debugger();
            return false;
        } 
	}
}
?>