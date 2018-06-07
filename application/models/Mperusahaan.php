<?php
/**
* 
*/
class Mperusahaan extends CI_Model
{
	function register($input)
	{
		$this->db->insert('_perusahaan', $input);
		redirect('home', 'refresh');
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
		$this->db->where('perusahaan_id', $id);
		$this->db->update('_perusahaan', $input);
	}

		function tampil_cabang($id)
	{	
		$this->db->order_by('_lokasi.lokasi_id','desc');
		$this->db->join('_lokasi', '_lokasi.perusahaan_id = _perusahaan.perusahaan_id');
		$this->db->where('_perusahaan.perusahaan_id', $id);
		$ambil = $this->db->get('_perusahaan');
		return $ambil->result_array();
	}

	function semua_jamkerja()
	{
		// $this->db->where('lokasi_id', $lokasi_id);
		$data = $this->db->get('_jam_kerja');
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

	function jam_kerja($jamkerja)
	{
		$cekdata = $this->db->query("SELECT * FROM _jam_kerja WHERE _jam_kerja.lokasi_id=$jamkerja[lokasi_id] AND _jam_kerja.kerja_hari='$jamkerja[kerja_hari]'");
		$ada = $cekdata->num_rows();
		if ($ada>0) {
			// $this->load->perusahaan('edit_jam_kerja');
			echo "<script>alert('Jam kerja sudah ditambahkan, anda yakin ingin mengedit?');</script>";
		}
		else{
			$this->db->insert('_jam_kerja', $jamkerja);
		}
	}

	function get_jam_kerja($id)
	{
		$this->db->where('lokasi_id', $id);
		$data = $this->db->get('_jam_kerja');
		return $data->result_array();
	}



	// Login User
	function auth($input)
	{
		$username = $input['AdmUsr'];
		$password = md5(md5($input['AdmPswd']));

		$this->db->where('perusahaan_user', $username);
		$this->db->where('perusahaan_password', $password);
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


}
?>