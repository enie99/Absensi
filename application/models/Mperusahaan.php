<?php
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
		$input['perusahaan_password'] = md5(md5($input['perusahaan_password']));
		$this->db->where('perusahaan_id', $id);
		$this->db->update('_perusahaan', $input);
	}

	function get_cabang($id)
	{	
		$this->db->order_by('_lokasi.lokasi_id','desc');
		$this->db->join('_lokasi', '_lokasi.perusahaan_id = _perusahaan.perusahaan_id', 'LEFT');
		// $this->db->join('_karyawan', '_lokasi.lokasi_id = _karyawan.lokasi_id', 'LEFT');
		$this->db->where('_perusahaan.perusahaan_id', $id);
		$ambil = $this->db->get('_perusahaan');
		$data = $ambil->result_array();
		return $data;
	}

	function tampil_cabang($id)
	{	
		$this->db->order_by('_lokasi.lokasi_id','desc');
		$this->db->join('_lokasi', '_lokasi.perusahaan_id = _perusahaan.perusahaan_id');
		$this->db->where('_perusahaan.perusahaan_id', $id);
		$ambil = $this->db->get('_perusahaan');
		return $ambil->result_array();
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
		// $this->db->where('lokasi_id', $lokasi_id);
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

	public function cari($keyword){
		$this->db->like('lokasi_nama', $keyword);
		$this->db->or_like('perusahaan_alamat',$keyword);
		return $this->db->get('_lokasi')->result_array();
	}
	
}
?>