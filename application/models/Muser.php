<?php

class Muser extends CI_Model
{

	public function get_data_user()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->join('user_role', 'user_role.id_role = user.role_id');
		$this->db->order_by('id_user', 'DESC');
		$query = $this->db->get();
		return $query;
	}

	public function hapus_user($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function items_out_by_user()
	{

		$id = $this->session->userdata['email']; // dapatkan id user yg login
		$this->db->select('*');
		$this->db->where('id_user', $id); //
		$this->db->from('barang_keluar');
		$query = $this->db->get();
		return $query->result();


		// $this->db->select('*');
		// $this->db->from('barang_keluar as bk');
		// $this->db->join('user as u', 'u.id_user = bk.id_user');
		// $this->db->order_by('id_bk', 'DESC');
		// return $this->db->get()->result();
	}
}