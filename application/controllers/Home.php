<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Mproduk');
		$this->load->model('Muser');
		$this->load->library('form_validation');
		$this->load->library('mylibrary');
		$this->load->helper('my_helper');
		$this->load->helper('text');
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

	public function Data_produk()
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
		$data['satuan'] = $this->Mproduk->satuan();
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


	// public function isi_kategori()
	// {
	// 	$this->load->model("Mproduk");
	// 	$x = $this->Mproduk->get_data_change();
	// 	foreach ($x as $r) {
	// 		echo "<option value=$r->id_kategori>$r->nama_produk";
	// 	}
	// }





	function qrcode($kode = 'https://fontawesome.com/icons/qrcode?s=solid')
	{

		//Rendering QR Code To 
		qrcode::png(
			$kode,
			$outfile = false,
			$level = QR_ECLEVEL_H,
			$size = 6,
			$margin = 1

		);
	}

	public function renderqr($id)
	{
		$where = array('id_produk' => $id);
		$data['dataqr'] = $this->Mproduk->edit_data($where, 'produk')->result();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('navbar',);
		$this->load->view('Vqrcode', $data);
		$this->load->view('footer');
	}



	public function save()
	{


		$data = array(
			'kode_produk' 		=> $this->input->post('kodeproduk'),
			'nama_produk' 		=> $this->input->post('namaproduk'),
			'id_kategori' 		=> $this->input->post('kategori'),
			'harga' 		    => $this->input->post('harga'),
			'id_satuan'			=> $this->input->post('satuan')


		);
		// $this->m_barang->add($data);
		// $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
		// redirect('user/data_barang');



		$this->Mproduk->add($data);
		$this->session->set_flashdata('pesan', 'Sukses Tambah Data');
		redirect('Home/Data_produk');
	}

	function edit($id)
	{
		$where = array('id_produk' => $id);
		$data['produk'] = $this->Mproduk->edit_items($where, 'produk')->result();
		$data['kategori'] = $this->Mproduk->kategori();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['datalib'] = $this->mylibrary->mylib();
		// print_r($data['datalib']);
		// die;
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('navbar');
		$this->load->view('Vedit', $data);
		$this->load->view('footer');
	}

	function update_barang()
	{
		$id = $this->input->post('id_produk');
		$namaproduk = $this->input->post('namaproduk');
		$kategori = $this->input->post('kategori');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');

		$data = array(
			'nama_produk' => $namaproduk,
			'id_kategori' => $kategori,
			'harga' => $harga,
			'stok' => $stok,
		);

		$where = array(
			'id_produk' => $id
		);

		$this->Mproduk->update_data_barang($where, $data, 'produk');
		$this->session->set_flashdata('pesan', 'Sukses Update Data');
		redirect('Home/data_produk');
	}

	function hapus($id)
	{
		$where = array('id_produk' => $id);
		$this->Mproduk->hapus_data($where, 'produk');
		$this->session->set_flashdata('pesan', 'Berhasil Hapus');
		redirect('Home/Data_produk');
	}



	function fetch()
	{
		$output = '';
		$query = '';
		$this->load->model('Mproduk');
		if ($this->input->post('query')) {
			$query = $this->input->post('query');
		}
		$data = $this->Mproduk->fetch_data($query);
		$output .= '
			 <div class="table-responsive-lg">
		
		';
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

	// FUNCTION BARANG KELUAR
	public function items_out()
	{



		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		// $data['items_out'] = $this->Mproduk->get_items_out()->result();
		$data['items_out'] = $this->db->get('user')->result();



		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('navbar');
		$this->load->view('Vitemsout', $data);
		$this->load->view('footer');
	}


	// SHOW DATA APPROVE BY ID USER
	public function Approve($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		// GET DATA BY ID
		$where = array('id_bk' => $id);
		// $data['items_out'] = $this->Mproduk->edit_items_out($where, 'barang_keluar')->result();
		$data['approve'] = $this->db->get_where('barang_keluar', ['id_user' => $id])->result();

		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('navbar');
		$this->load->view('Vapprove', $data);
		$this->load->view('footer');
	}

	// EDIT DATA APPROVE
	public function edit_approve($id)
	{
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$where = array('id_bk' => $id);
		$data['items_out'] = $this->Mproduk->edit_items_out($where, 'barang_keluar')->result();
		$data['status'] = $this->Mproduk->status();

		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('navbar');
		$this->load->view('Vedit_approve', $data);
		$this->load->view('footer');
	}

	// UPDATE APPROVE

	function update_approve()
	{


		$id = $this->input->post('id_bk');
		$s = $this->input->post('status');
		$qty = $this->input->post('qty');

		$data = array(
			'id_status' => $s,
			'qty' => $qty
		);

		$where = array(
			'id_bk' => $id

		);

		$this->Mproduk->update_approve($where, $data, 'barang_keluar');
		$this->session->set_flashdata('pesan', 'Sukses Update Data');
		redirect('Home/items_out');
	}

	// END

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

	function hapus_supplier($id)
	{
		$where = array('id_supplier' => $id);
		$this->Mproduk->hapus_data($where, 'supplier');
		$this->session->set_flashdata('pesan', 'Berhasil Hapus');
		redirect('Home/data_supplier');
	}
	function hapus_itemsout($id)
	{
		$where = array('id_bk' => $id);
		$this->Mproduk->hapus_itemsout($where, 'barang_keluar');
		$this->session->set_flashdata('pesan', 'Berhasil Hapus');
		redirect('Home/items_out');
	}
}