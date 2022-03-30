<?php
class Msupplier extends CI_Model
{

	public function get_data()
	{


		$this->db->select('*');
		$this->db->from('supplier');
		// $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
		$this->db->order_by('id_supplier', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	public function kategori()
	{
		$query = $this->db->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
		return $query->result();
	}

	public function cek_kode_produk()
	{
		$query = $this->db->query("SELECT MAX(kode_produk) as kodeproduk from produk");
		$hasil = $query->row();
		return  $hasil->kodeproduk;
	}

	public function add($data)
	{
		$this->db->insert('supplier', $data);
	}

	function edit_data($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}


	function hapus_produk($id)
	{
		$this->db->delete('produk', array('id_produk' => $id));
	}

	function fetch_data($query)
	{
		$this->db->select("*");
		$this->db->form("produk");
		if ($query !== '') {
			$this->db->like('nama_produk', $query);
			$this->db->or_like('id_kategori', $query);
			$this->db->or_like('stok', $query);
		}
		$this->db->order_by('id_produk', 'DESC');
		return $this->db->get();
	}
}