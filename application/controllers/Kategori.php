<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mproduk');
		if (!$this->session->userdata('email')) {
			redirect('Login');
		}
	}

	public function index()
	{
		// $data['produk'] = $this->Mproduk->get_data();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['kategori'] = $this->Mproduk->kategori();
		// $this->load->view('ci', $data);
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('navbar');
		$this->load->view('Vdatakategori');
		$this->load->view('footer');
	}

	// public function Data_produk()
	// {
	// 	// $data['produk'] = $this->Mproduk->get_data();

	// 	$db = $this->Mproduk->cek_kode_produk();
	// 	// contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
	// 	$nourut = substr($db, 3, 4);
	// 	$kodeproduknow = $nourut + 1;
	// 	$data = array('kode_produk' => $kodeproduknow);
	// 	$data['produk'] = $this->Mproduk->get_data();
	// 	$data['kategori'] = $this->Mproduk->kategori();
	// 	$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	// 	$data['produk'] = $this->Mproduk->get_data()->result();
	// 	$this->load->view('header');
	// 	$this->load->view('sidebar', $data);
	// 	$this->load->view('navbar');
	// 	$this->load->view('ci', $data);
	// 	// $this->load->view('content');
	// 	$this->load->view('data_tables_js');
	// 	$this->load->view('footer');
	// }

	public function add()
	{

		// $db = $this->Mproduk->cek_kode_produk();
		// contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
		// $nourut = substr($db, 3, 4);
		// $kodeproduknow = $nourut + 1;
		// $data = array('kode_produk' => $kodeproduknow);
		// $data['produk'] = $this->Mproduk->get_data();
		$data['kategori'] = $this->Mproduk->kategori();
		$this->load->view('form_produk', $data);
	}

	public function save()
	{

		$data = array(
			'nama_kategori' => $this->input->post('kategori')
		);
		$this->db->insert('kategori', $data);
		$this->session->set_flashdata('pesan', 'Berhasil Tambah Data');
		redirect('Kategori');
	}

	function hapus_kategori($id)
	{
		$where = array('id_kategori' => $id);
		$this->Mproduk->hapus_data($where, 'kategori');
		$this->session->set_flashdata('pesan', 'Berhasil Hapus');
		redirect('Kategori');
	}
}