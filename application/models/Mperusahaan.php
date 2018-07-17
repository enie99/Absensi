<?php
class Mperusahaan extends CI_Model
{
	function __construct(){
        
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

	function profil($id)
	{
		$this->db->where('perusahaan_id', $id);
		$data = $this->db->get('_perusahaan');
		return $data->row_array();
	}

	function tampil()
	{
		$ambil = $this->db->get('_perusahaan');
		return $ambil->result_array();
	}

	function edit_profil($id,$input)
	{
		$input['perusahaan_user'] = $input['perusahaan_email'];
		$input['perusahaan_password'] = md5(md5($input['perusahaan_password']));
		$this->db->where('perusahaan_id', $id);
		$this->db->update('_perusahaan', $input);
	}

	function get_cabang($id)
	{	
		$this->db->order_by('l.lokasi_id','desc');
		$this->db->join('_perusahaan p', 'l.perusahaan_id = p.perusahaan_id', 'LEFT');
		// $this->db->join('_karyawan k','l.lokasi_id = k.lokasi_id','LEFT');
		// $this->db->count('k.karyawan_id AS jml_karyawan');
		$this->db->where('l.perusahaan_id', $id);
		$ambil = $this->db->get('_lokasi l');
		$data = $ambil->result_array();
		return $data;
	}

	function cari($keyword){
		// $this->db->like('lokasi_nama', $keyword);
		// $this->db->or_like('perusahaan_alamat',$keyword);

		$data = $this->db->query("SELECT *,count(k.karyawan_id) AS jml_karyawan FROM _lokasi l
			LEFT JOIN _karyawan k ON l.lokasi_id = k.lokasi_id
			WHERE lokasi_nama LIKE '%$keyword%' OR perusahaan_alamat LIKE '%$keyword%'
			GROUP BY l.lokasi_id");
		return $data->result_array();
	}

	function get_perusahaan()
	{
		$id = $_SESSION['user']['perusahaan_id'];
		$this->db->select('l.lokasi_id, l.lokasi_nama,l.perusahaan_title,l.perusahaan_alamat,l.qr_code, count(k.karyawan_id) AS jml_karyawan');
		$this->db->group_by('l.lokasi_id', 'DESC');
		$this->db->where('l.perusahaan_id', $id);
		$this->db->join('_karyawan k', 'l.lokasi_id = k.lokasi_id', 'left');
		$this->db->join('_perusahaan p', 'p.perusahaan_id = l.lokasi_id', 'left');
		$data = $this->db->get('_lokasi l');
		return $data->result_array();
	}
	function get_perusahaan_pagination($limit, $page)
	{
		$id = $_SESSION['user']['perusahaan_id'];
		$this->db->select('l.lokasi_id, l.lokasi_nama,l.perusahaan_title,l.perusahaan_alamat,l.qr_code, count(k.karyawan_id) AS jml_karyawan');
		$this->db->order_by('l.lokasi_id', 'desc');
		$this->db->limit($limit, $page);
		$this->db->group_by('l.lokasi_id');
		$this->db->where('l.perusahaan_id', $id);
		$this->db->join('_karyawan k', 'l.lokasi_id = k.lokasi_id', 'left');
		$this->db->join('_perusahaan p', 'p.perusahaan_id = l.lokasi_id', 'left');
		$data = $this->db->get('_lokasi l');
		return $data->result_array();
	}

	function tampil_cabang()
	{	
		$id = $_SESSION['user']['perusahaan_id'];
		$data = $this->db->query("SELECT *, count(k.karyawan_id) AS jml_karyawan FROM _lokasi l
				LEFT JOIN _karyawan k ON l.lokasi_id = k.lokasi_id
				LEFT JOIN _perusahaan p  ON p.perusahaan_id = l.lokasi_id
				WHERE l.perusahaan_id = '$id' GROUP BY l.lokasi_id DESC");
		return $data->result_array();
	}

	function add_lokasi($input,$image_name)
	{
		$data = array(
			'perusahaan_id' 	=> $input['perusahaan_id'],
			'lokasi_nama' 		=> $input['lokasi_nama'],
			'perusahaan_title' 	=> $input['perusahaan_title'],
			'perusahaan_alamat' => $input['perusahaan_alamat'],
			'latitude' 			=> $input['latitude'],
			'longitude' 		=> $input['longitude'],
			'qr_code' 			=> $image_name
		);

		$this->db->insert('_lokasi', $data);
	}

	function get_by_id($id)
	{
		$this->db->where('lokasi_id', $id);
		$data = $this->db->get('_lokasi');
		return $data->row_array();
	}
	
	function edit($id, $input, $image_name)
	{
		$data = array(
			'lokasi_nama' 		=> $input['lokasi_nama'],
			'perusahaan_title' 	=> $input['perusahaan_title'],
			'perusahaan_alamat' => $input['perusahaan_alamat'],
			'latitude' 			=> $input['latitude'],
			'longitude' 		=> $input['longitude'],
			'qr_code' 			=> $image_name
		);

		$ambil 		= $this->get_by_id($id);
		$qrcode_old	= $ambil['qr_code'];

		if (!empty($qrcode_old)) {
			unlink(FCPATH."assets/images/qrcode/".$qrcode_old);
		}

		$this->db->where('lokasi_id', $id);
		$this->db->update('_lokasi', $data);
	}

	function get_jamkerja($id)
	{
		$this->db->where('lokasi_id', $id);
		$ambil = $this->db->get('_jam_kerja');
		return $ambil->result_array();
	}
	function get_jamkerja_by_hari($id,$hari)
	{
		$this->db->where('lokasi_id',$id);
		$this->db->where('kerja_hari',$hari);
		$data = $this->db->count_all_results('_jam_kerja');
		return $data;
	}
	function semua_jamkerja()
	{
		$data = $this->db->get('_jam_kerja');
		return $data->result_array();
	}
	function jam_kerja($hari, $id, $jamkerja)
	{
		$datatime = $this->get_jamkerja_by_hari($id,$hari);
		if ($datatime > 0) {
			if (empty($jamkerja['jam_masuk'] && $jamkerja['jam_keluar']))
				$this->del_jam_kerja($id,$hari);
			elseif (empty($jamkerja['jam_masuk'] || $jamkerja['jam_keluar']))
				$this->del_jam_kerja($id,$hari);
			else
				$this->edit_jam_kerja($hari, $id, $jamkerja);
		}
		else
		{
			if (empty($jamkerja['jam_masuk'] && $jamkerja['jam_keluar'])) {	}
			else
				$this->add_jam_kerja($jamkerja);
		}
	}
	function del_jam_kerja($id,$hari)
	{
		$this->db->where('lokasi_id',$id);
		$this->db->where('kerja_hari',$hari);
		$this->db->delete('_jam_kerja');
	}
	function add_jam_kerja($jamkerja)
	{
		$this->db->insert('_jam_kerja', $jamkerja);
	}
	function edit_jam_kerja($hari, $id, $jamkerja)
	{
		$this->db->where('lokasi_id', $id);
		$this->db->where('kerja_hari', $hari);
		$this->db->update('_jam_kerja', $jamkerja);
	}


	// Register
	public function register($input)
	{
		return $this->db->insert('_perusahaan', $input);
	}
	// Login User
	function auth($input)
	{
		$username = $input['AdmUsr'];
		$password = md5(md5($input['AdmPswd']));

		$this->db->where('perusahaan_user', $username);
		$this->db->where('perusahaan_password', $password);
		$this->db->where('status', 1);
		$ambil = $this->db->get('_perusahaan');
		$hasil = $ambil->num_rows();

		if($hasil>0) {
			$akun = $ambil->row_array();
			$this->session->set_userdata('user', $akun);

			return 'berhasil';
		}
		else
		{
			return 'gagal';
		}
	}

	 //send confirm mail
    public function sendEmail($receiver){
        $from = "hilo73ch@gmail.com";    //senders email address
        $subject = 'Verifikasi Email Pendaftaran - Absensi Karyawan';  //email subject

        $message = 'Terima kasih sudah bergabung dengan Absensi Karyawan.<br><br> Silahkan melakukan konfirmasi pendaftaran dengan menekan link dibawah ini. <br><br>

	        <a href='.base_url().'home/confirmEmail/'.md5(md5($receiver)).'>KONFIRMASI EMAIL</a><br><br>

	        Thanks';
        
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

     //activate account
    function verifyEmail($key){
        $data = array('status' => 1);
        $this->db->where('md5(md5(perusahaan_email))',$key);
        return $this->db->update('_perusahaan', $data);    //update status as 1 to make active user
    }

	
}
?>