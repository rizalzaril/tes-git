<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Relokasi extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mproduk');
		$this->load->model('Msupplier');
		$this->load->library('form_validation');
		if (!$this->session->userdata('email')) {
			redirect('Login');
		}
	}

	public function index()
	{
		// $data['produk'] = $this->Mproduk->get_data();

		// Tampilkan jumalh row pada table
		$user_data = $this->db->query("SELECT * FROM user");
		$data['user_total'] = $user_data->num_rows();
		// end
		// Tampilkan jumalh row pada table
		$produk = $this->db->query("SELECT * FROM produk");
		$data['produk_total'] = $produk->num_rows();
		// end
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['produk'] = $this->Mproduk->get_data()->result();
		// $this->load->view('ci', $data);
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('navbar');
		$this->load->view('content', $data);
		$this->load->view('footer');
	}

	public function Data_inventory()
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
		$this->load->view('Vinventory', $data);
		$this->load->view('footer');
	}


	public function data_supplier()
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['supplier'] = $this->Msupplier->get_data()->result();
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('navbar');
		$this->load->view('Vsupplier', $data);
		$this->load->view('footer');
	}

	// public function add()
	// {

	// 	$db = $this->Mproduk->cek_kode_produk();
	// 	// contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
	// 	$nourut = substr($db, 3, 4);
	// 	$kodeproduknow = $nourut + 1;
	// 	$data = array('kode_produk' => $kodeproduknow);
	// 	$data['produk'] = $this->Mproduk->get_data();
	// 	$data['kategori'] = $this->Mproduk->kategori();
	// 	$this->load->view('form_produk', $data);
	// }

	public function save()
	{

		$this->form_validation->set_rules('namaproduk', 'Nama Produk', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));



		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/foto';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
			$config['max_size']     = '2000';
			$this->upload->initialize($config);
			$field_name = "foto";
			if (!$this->upload->do_upload($field_name)) {
			} else {
				$upload_data	= array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/foto' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'nama_supplier' 		=> $this->input->post('namasupplier'),
					'telepon' 		=> $this->input->post('telepon'),
					'jenis_tempat' 		=> $this->input->post('jenistempat'),
					'alamat' 				=> $this->input->post('alamat'),
					'foto'				=> $upload_data['uploads']['file_name'],
				);
				// $this->m_barang->add($data);
				// $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
				// redirect('user/data_barang');


			}
			$this->Msupplier->add($data);
			$this->session->set_flashdata('pesan', 'Sukses Tambah Data');
			redirect('Relokasi/data_supplier');
		}
	}

	public function save_supplier()
	{

		$data = array(
			'nama_supplier' => $this->input->post('namasupplier'),
			'telepon' => $this->input->post('telepon'),
			'jenis_tempat' => $this->input->post('jenistempat'),
			'alamat' => $this->input->post('alamat')

		);
		$this->db->insert('supplier', $data);
		$this->session->set_flashdata('pesan', 'Berhasil Tambah Data');
		redirect('Relokasi/data_supplier');
	}

	function hapus_supplier($id)
	{
		$where = array('id_supplier' => $id);
		$this->Mproduk->hapus_data($where, 'supplier');
		$this->session->set_flashdata('pesan', 'Berhasil Hapus');
		redirect('');
	}

	function edit($id)
	{
		$where = array('id_produk' => $id);
		$data['produk'] = $this->Mproduk->edit_data($where, 'produk')->result();
		$data['kategori'] = $this->Mproduk->kategori();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('navbar');
		$this->load->view('Vedit', $data);
		$this->load->view('footer');
	}

	function hapus($id)
	{
		$where = array('id_supplier' => $id);
		$this->Mproduk->hapus_data($where, 'supplier');
		$this->session->set_flashdata('pesan', 'Berhasil Hapus');
		redirect('Relokasi/data_supplier');
	}
}