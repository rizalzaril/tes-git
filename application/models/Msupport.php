<?php

use LDAP\Result;

class Msupport extends CI_Model
{

	public function get_data_client()
	{
		$this->db->select('*');
		$this->db->from('client');
		$this->db->join('perusahaan', 'perusahaan.id_perusahaan = client.id_perusahaan');
		$this->db->order_by('id_client', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	public function save_data_client($data)
	{
		$this->db->insert('client', $data);
	}

	public function save_data_perusahaan($data)
	{
		$this->db->insert('perusahaan', $data);
	}

	public function save_vendor($data)
	{
		$this->db->insert('vendor', $data);
	}


	public function get_vendor()
	{
		$this->db->select('*');
		$this->db->from('vendor');
		$this->db->order_by('id_vendor', 'DESC	');
		$query = $this->db->get();
		return $query;
	}

	public function get_data_perusahaan()
	{
		$this->db->select('*');
		$this->db->from('perusahaan');
		$this->db->order_by('id_perusahaan', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	public function get_data_service()
	{
		$this->db->select('*');
		$this->db->from('service_status');
		$this->db->order_by('DESC');
		$query = $this->db->get();
		return $query;
	}

	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function kategori_perusahaan()
	{
		$query = $this->db->query("SELECT * FROM perusahaan ORDER BY nama_perusahaan ASC");
		return $query->result();
	}


	// SCRIPT GET CODE OTOMATIS

	public function cek_kode_client()
	{
		$query = $this->db->query("SELECT MAX(kode_client) as kodeclient from client");
		$hasil = $query->row();
		return  $hasil->kodeclient;
	}

	public function cek_kode_perusahaan()
	{
		$query = $this->db->query("SELECT MAX(kode_perusahaan) as kodeperusahaan from perusahaan");
		$hasil = $query->row();
		return  $hasil->kodeperusahaan;
	}

	public function cek_kode_vendor()
	{
		$query = $this->db->query("SELECT MAX(kode_vendor) as kodevendor from vendor");
		$hasil = $query->row();
		return $hasil->kodevendor;
	}
}