<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Mproduk');
		$this->load->model('Muser');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->helper('url', 'my');
		if (!$this->session->userdata('email')) {
			redirect('Login');
		}
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('petugas/Header');
			$this->load->view('petugas/sidebar', $data);
			$this->load->view('petugas/navbar');
			$this->load->view('petugas/content');
			$this->load->view('petugas/Vdashboard');
			$this->load->view('petugas/footer');
		}
	}


	public function data_barang()
	{
		// $data['produk'] = $this->Mproduk->get_data();

		$db = $this->Mproduk->cek_kode_produk();
		// contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
		$nourut = substr($db, 3, 4);
		$kodeproduknow = $nourut + 1;
		$data = array('kode_produk' => $kodeproduknow);
		$data['produk'] = $this->Mproduk->get_data();

		// select kategori
		$data['kategori'] = $this->Mproduk->kategori();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['produk'] = $this->Mproduk->get_data()->result();
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('navbar');
		$this->load->view('ci', $data);
		// $this->load->view('content');
		// $this->load->view('data_tables_js');
		$this->load->view('footer');
	}


	public function items_out()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email_cust')])->row_array();
		$user = $this->db->get_where('user', ['email' => $this->session->userdata('email_cust')])->row_array();

		// GET DATA BY ID

		// $data['items_out'] = $this->Mproduk->edit_items_out($where, 'barang_keluar')->result();
		$data['items_out'] = $this->Muser->items_out_by_user();
		$this->load->view('petugas/Header');
		$this->load->view('petugas/sidebar', $data);
		$this->load->view('petugas/navbar');
		$this->load->view('petugas/Vitemsout', $data);
		$this->load->view('petugas/footer');
	}

	public function items_in()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->Mproduk->kategori();
		$data['produk'] = $this->Mproduk->get_data()->result();
		$data['items_in'] = $this->Mproduk->get_items_in()->result();
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('navbar');
		$this->load->view('Vitemsin', $data);
		$this->load->view('footer');
	}

	public function save_items_out()
	{

		$data = array(
			'id_produk' => $this->input->post('namabarang'),
			'id_kategori' => $this->input->post('kategori'),
			'qty' => $this->input->post('qty'),
			'keterangan' => $this->input->post('keterangan'),
			'pengguna' => $this->input->post('pengguna'),
			'tanggal' => $this->input->post('tanggal')

		);
		$this->db->insert('barang_keluar', $data);
		$this->session->set_flashdata('pesan', 'Berhasil Tambah Data');
		redirect('Home/items_out');
	}

	public function save_items_in()
	{

		$data = array(
			'id_produk' => $this->input->post('namabarang'),
			// 'id_kategori' => $this->input->post('kategori'),
			'qty' => $this->input->post('qty'),
			'id_supplier' => $this->input->post('supplier'),
			'tanggal_masuk' => $this->input->post('tanggal')

		);
		$this->db->insert('barang_masuk', $data);
		$this->session->set_flashdata('pesan', 'Berhasil Tambah Data');
		redirect('Home/items_in');
	}

	function hapus_itemsout($id)
	{
		$where = array('id_bk' => $id);
		$this->Mproduk->hapus_itemsout($where, 'barang_keluar');
		$this->session->set_flashdata('pesan', 'Berhasil Hapus');
		redirect('Home/items_out');
	}
}