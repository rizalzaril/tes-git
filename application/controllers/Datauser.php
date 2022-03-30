<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datauser extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Muser');
		$this->load->helper('my');

		is_loggin();

		// if (!$this->session->userdata('email')) {
		// 	redirect('Login');
		// } elseif (!$this->session->userdata('email', 'role_id') == 1) {
		// 	redirect('Login');
		// }
	}

	public function index()
	{


		// $data['produk'] = $this->Mproduk->get_data();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['userdata'] = $this->Muser->get_data_user()->result();
		// $this->load->view('ci', $data);
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('navbar');
		$this->load->view('Vdatauser', $data);
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
		$data['kategori'] = $this->Mproduk->kategori();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['produk'] = $this->Mproduk->get_data()->result();
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('navbar');
		$this->load->view('ci', $data);
		// $this->load->view('content');
		$this->load->view('data_tables_js');
		$this->load->view('footer');
	}

	public function add()
	{

		$db = $this->Mproduk->cek_kode_produk();
		// contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
		$nourut = substr($db, 3, 4);
		$kodeproduknow = $nourut + 1;
		$data = array('kode_produk' => $kodeproduknow);
		$data['produk'] = $this->Mproduk->get_data();
		$data['kategori'] = $this->Mproduk->kategori();
		$this->load->view('form_produk', $data);
	}

	public function save()
	{

		$this->form_validation->set_rules('namaproduk', 'Nama Produk', 'required', array(
			'required' => '%s Haris Diisi !!!'
		));
		// $this->form_validation->set_rules('id_kategori', 'Kategori', 'required', array(
		// 	'required' => '%s Haris Diisi !!!'
		// ));
		// $this->form_validation->set_rules('harga', 'Harga', 'required', array(
		// 	'required' => '%s Haris Diisi !!!'
		// ));
		// $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', array(
		// 	'required' => '%s Haris Diisi !!!'
		// ));


		if ($this->form_validation->run() == TRUE) {
			$config['upload_path'] = './assets/foto';
			$config['allowed_types'] = 'gif|jpg|png|jpeg|ico|jfif';
			$config['max_size']     = '2000';
			$this->upload->initialize($config);
			$field_name = "foto";
			if (!$this->upload->do_upload($field_name)) {
			} else {
				$upload_data    = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './assets/foto' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'kode_produk'         => $this->input->post('kodeproduk'),
					'nama_produk'         => $this->input->post('namaproduk'),
					'id_kategori'         => $this->input->post('kategori'),
					'harga'             => $this->input->post('harga'),
					'deskripsi'           => $this->input->post('deskripsi'),
					'foto'                => $upload_data['uploads']['file_name'],
				);
				// $this->m_barang->add($data);
				// $this->session->set_flashdata('pesan', 'Data Berhasil Ditambahkan !!!');
				// redirect('user/data_barang');


			}
			$this->Mproduk->add($data);
			$this->session->set_flashdata('pesan', 'Berhasil Tambah Data');
			// $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show">
			//         <button type="button" class="close" data-dismiss="alert">&times;</button>
			//         <strong>Congratulation!</strong> Sukses Tambah Data!
			//     </div>');
			redirect('Home/Data_produk');
		}
	}

	function hapus_user($id)
	{
		$where = array('id_user' => $id);
		$this->Muser->hapus_user($where, 'user');
		$this->session->set_flashdata('pesan', 'Berhasil Hapus');
		redirect('Datauser');
	}
}