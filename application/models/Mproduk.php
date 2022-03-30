<?php
class Mproduk extends CI_Model
{
	public function __construct()
	{
	}

	public function get_data()
	{


		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
		$this->db->order_by('id_produk', 'DESC');
		$query = $this->db->get();
		return $query;
	}


	public function get_data_change()
	{
		$sql = "Select * from produk";
		$query = $this->db->query($sql);
		return $query->result();
	}

	function getchange($postData)
	{
		$response = array();

		// Select record
		$this->db->select('id_produk,nama_produk');
		$this->db->where('kategori', $postData['kategori']);
		$q = $this->db->get('produk');
		$response = $q->result_array();

		return $response;
	}



	public function get_items_in()
	{

		$this->db->select('*');
		$this->db->from('barang_masuk');
		$this->db->join('produk', 'produk.id_produk = barang_masuk.id_produk', 'LEFT');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'LEFT');
		$this->db->order_by('id_bm', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	public function get_items_out()
	{
		$this->db->select('*');
		$this->db->from('barang_keluar');
		$this->db->join('produk', 'produk.id_produk = barang_keluar.id_produk', 'LEFT');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'LEFT');
		$this->db->join('user', 'user.id_user = barang_keluar.id_user', 'LEFT');
		$this->db->order_by('id_bk', 'DESC');
		$query = $this->db->get();
		return $query;




		// $query = $this->db->query('SELECT id_bk FROM barang_keluar WHERE id_user');
		// return $query;
	}


	public function get_change($table, $field, $criteria)
	{
		$sql = "Select * from $table where $field = '$criteria'";
		$query = $this->db->query($sql);
		return $query->result();
	}


	public function kategori()
	{

		$query = $this->db->query("SELECT * FROM kategori ORDER BY nama_kategori ASC");
		return $query->result();
	}

	public function satuan()
	{

		$query = $this->db->query("SELECT * FROM satuan_barang ORDER BY nama_satuan ASC");
		return $query->result();
	}

	public function status()
	{

		$query = $this->db->query("SELECT * FROM tb_status ORDER BY nama_status ASC");
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
		$this->db->insert('produk', $data);
	}

	// approvel
	public function getquery($query)
	{
		$query = $this->db->query($query);

		return $query->row();
	}

	// EDIT DATA APPROVE
	function edit_items_out($where, $table)
	{
		return $this->db->get_where($table, $where);
		$this->db->select('*');
		$this->db->from('barang_keluar');
		$this->db->join('produk', 'produk.id_produk = barang_keluar.id_produk', 'LEFT');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'LEFT');
		$this->db->join('user', 'user.id_user = barang_keluar.id_user', 'LEFT');
		$this->db->order_by('id_bk', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	// EDIT DATA APPROVE
	function edit_items($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	function update_approve($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	function update_data_barang($where, $data, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
	}

	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function hapus_itemsout($where, $table)
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