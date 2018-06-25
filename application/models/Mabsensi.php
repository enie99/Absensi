<?php

class Mabsensi extends CI_Model
{

	public function tampil()
	
	{
		$this->db->join('_karyawan', '_karyawan.karyawan_id = _absensi.karyawan_id');
		$this->db->join('_lokasi', '_lokasi.lokasi_id = _karyawan.lokasi_id');
		$ambil = $this->db->get('_absensi');
		return $ambil->result_array();
	}

	public function get_cabang(){
		$hasil=$this->db->query("SELECT * FROM _lokasi");
		return $hasil;
	}

	public function get_karyawan($id){
		$hasil=$this->db->query("SELECT * FROM _karyawan WHERE lokasi_id='$id'");
		return $hasil->result();
	}

	public function pencarian_d($cabang,$bulan,$tahun,$karyawan){
		$this->db->join('_karyawan', '_karyawan.karyawan_id = _absensi.karyawan_id');
		$this->db->join('_lokasi', '_lokasi.lokasi_id = _karyawan.lokasi_id');
		$this->db->where('_lokasi.lokasi_id',$cabang);
		$this->db->where('month(tanggal)',$bulan);
		$this->db->where('year(tanggal)',$tahun);
		$this->db->where('_karyawan.karyawan_nama',$karyawan);
		$ambil = $this->db->get('_absensi');
		return $ambil->result_array();
	}

	public function get_data()
	{
		$id = $_SESSION['user']['perusahaan_id'];
		$data = $this->db->query("SELECT l.lokasi_id, a.status, COUNT(a.status) as jumlah FROM _absensi a
			LEFT JOIN _karyawan k ON k.karyawan_id = a.karyawan_id
			LEFT JOIN _lokasi l ON l.lokasi_id = k.lokasi_id
			LEFT JOIN _perusahaan p  ON p.perusahaan_id = l.lokasi_id
			WHERE date(tanggal) = CURDATE() AND l.perusahaan_id = '$id'
			GROUP BY l.lokasi_id ASC, a.status ASC ");
		return $data->result_array();
	}

	public function getAll() 
	{
		$this->db->select('*');
		$this->db->join('_lokasi', '_karyawan.lokasi_id = _lokasi.lokasi_id');
		$this->db->join('_absensi', '_karyawan.karyawan_id = _absensi.karyawan_id');
		$ambil = $this->db->get('_karyawan');
		return $ambil->result_array();
	}

	public function get_by_id($id)
	{
		$this->db->where('karyawan_id', $id);
		$ambil = $this->db->get('_absensi');
		return $ambil->row_array();
	}

	public function hapus($id){
		$this->db->where('karyawan_id', $id);
		$this->db->delete('_absensi');
	}

	// public function cari($keyword){
	// 	$this->db->like('karyawan_nama', $keyword); //mencari data yang serupa dengan keyword
	// 	$this->db->join('_lokasi', '_karyawan.lokasi_id = _lokasi.lokasi_id');
	// 	$this->db->join('_absensi', '_karyawan.karyawan_id = _absensi.karyawan_id');
	// 	$ambil = $this->db->get('_karyawan');
	// 	return $ambil->result_array();
	// }

	public function detail($id){
		$this->db->join('_lokasi', '_karyawan.lokasi_id = _lokasi.lokasi_id');
		$this->db->join('_absensi', '_karyawan.karyawan_id = _absensi.karyawan_id');
		$this->db->where('_karyawan.karyawan_id', $id);
		$ambil = $this->db->get('_karyawan');
		return $ambil->row_array();
	}

	public function detail_absensi($id){
		$this->db->join('_lokasi', '_karyawan.lokasi_id = _lokasi.lokasi_id');
		$this->db->join('_absensi', '_karyawan.karyawan_id = _absensi.karyawan_id');
		$this->db->where('_karyawan.karyawan_id', $id);
		$ambil = $this->db->get('_karyawan');
		return $ambil->result_array();
	}

	public function semua_cabang($id){
		$this->db->where('_perusahaan.perusahaan_id', $id);
		$this->db->join('_perusahaan', '_perusahaan.perusahaan_id = _lokasi.perusahaan_id');
		$ambil = $this->db->get('_lokasi');
		return $ambil->result_array();
	}

	public function semua_karyawan($lokasi_id){ //Semua karyawan berdasarkan lokasi/cabang perusahaan
		$this->db->where('_karyawan.lokasi_id', $lokasi_id);
		$this->db->join('_lokasi', '_lokasi.lokasi_id = _karyawan.lokasi_id');
		$this->db->group_by('_lokasi.lokasi_id');
		$ambil = $this->db->get('_karyawan');
		return $ambil->result_array();
	}

	public function kehadiran($bulan){
		$this->db->select('karyawan_id, status, count(status) AS jumlah');
		$this->db->from('_absensi');
		$this->db->where('month(tanggal)', $bulan);
		$this->db->group_by('status, karyawan_id');
		$ambil = $this->db->get();
		return $ambil->result_array();
	}

	public function cari($bulan){
		
		$this->db->select('karyawan_id, status, count(status) AS jumlah');
		$this->db->from('_absensi');
		$this->db->where('month(tanggal)', $bulan);
		$this->db->group_by('status, karyawan_id');
		$ambil = $this->db->get();
		return $ambil->result_array();
	}
}
?>