<?php

class Mabsensi extends CI_Model
{

	public function tampil()
	
	{
		$this->db->join('_lokasi', '_karyawan.lokasi_id = _lokasi.lokasi_id');
		$this->db->join('_absensi', '_karyawan.karyawan_id = _absensi.karyawan_id');
		$ambil = $this->db->get('_karyawan');
		return $ambil->result_array();
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

	public function cari($keyword){
		$this->db->like('karyawan_nama', $keyword); //mencari data yang serupa dengan keyword
		$this->db->join('_lokasi', '_karyawan.lokasi_id = _lokasi.lokasi_id');
		$this->db->join('_absensi', '_karyawan.karyawan_id = _absensi.karyawan_id');
		$ambil = $this->db->get('_karyawan');
		return $ambil->result_array();
	}

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
}
?>