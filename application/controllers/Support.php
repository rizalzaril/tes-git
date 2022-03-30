<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Support extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Msupport');
		$this->load->library('form_validation');
		$this->load->library('mylibrary');
		$this->load->helper('my_helper');
		if (!$this->session->userdata('email')) {
			redirect('Login');
		}
	}

	// DATA CLIENT

	public function Data_client()
	{
		$db = $this->Msupport->cek_kode_client();
		// contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
		$nourut = substr($db, 3, 4);
		$kodeclientnow = $nourut + 1;
		$data = array('kode_client' => $kodeclientnow);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['perusahaan'] = $this->Msupport->kategori_perusahaan();
		$data['client'] = $this->Msupport->get_data_client()->result();
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('navbar');
		$this->load->view('Vdataclient', $data);
		$this->load->view('footer');
	}


	public function save_client()
	{
		$data = array(
			'kode_client' 	=> $this->input->post('kodeclient'),
			'nama_client' 	=> $this->input->post('nama_client'),
			'telepon'		=> $this->input->post('telepon'),
			'id_perusahaan'	=> $this->input->post('perusahaan')
		);
		$this->Msupport->save_data_client($data);
		$this->session->set_flashdata('pesan', 'Sukses Tambah Data');
		redirect('Support/Data_client');
	}

	function hapus_client($id)
	{
		$where = array('id_client' => $id);
		$this->Msupport->hapus_data($where, 'client');
		$this->session->set_flashdata('pesan', 'Berhasil Hapus');
		redirect('Support/data_client');
	}

	// END DATA CLIENT

	// COMPANY DATA
	public function Data_company()
	{
		$db = $this->Msupport->cek_kode_perusahaan();
		// contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
		$nourut = substr($db, 3, 4);
		$kodenow = $nourut + 1;
		$data = array('kode_perusahaan' => $kodenow);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['company'] = $this->Msupport->get_data_perusahaan()->result();
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('navbar');
		$this->load->view('Vdatacompany', $data);
		$this->load->view('footer');
	}

	public function save_perusahaan()
	{
		$data = array(
			'kode_perusahaan' => $this->input->post('kodeperusahaan'),
			'nama_perusahaan' => $this->input->post('namaperusahaan'),
			'telepon'	=> $this->input->post('telepon'),
			'alamat' 	=> $this->input->post('alamat')
		);
		$this->Msupport->save_data_perusahaan($data);
		$this->session->set_flashdata('pesan', 'Berhasil Simpan');
		redirect('Support/Data_company');
	}

	public function hapus_data_company($id)
	{
		$where = array('id_perusahaan' => $id);
		$this->Msupport->hapus_data($where, 'perusahaan');
		$this->session->set_flashdata('pesan', 'Berhasil Hapus');
		redirect('Support/data_company');
	}
	// END COMPANY


	// DATA VENDOR

	public function Vendor()
	{
		$db = $this->Msupport->cek_kode_vendor();
		$nourut = substr($db, 3, 4);
		$kodenow = $nourut + 1;
		$data = array('kode_vendor' => $kodenow);
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['vendor'] = $this->Msupport->get_vendor()->result();
		$this->load->view('header');
		$this->load->view('sidebar', $data);
		$this->load->view('navbar');
		$this->load->view('Vdatavendor');
		$this->load->view('footer');
	}


	public function save_vendor()
	{
		$data = array(
			'kode_vendor' => $this->input->post('kodevendor'),
			'nama_vendor' => $this->input->post('namavendor'),
			'alamat' 	  => $this->input->post('alamat'),
			'telepon'     => $this->input->post('telepon'),
			'email'       => $this->input->post('email'),
		);
		$this->Msupport->save_vendor($data);
		$this->session->set_flashdata('pesan', 'Berhasil Disimpan');
		redirect('Support/Vendor');
	}


	public function edit_vendor($id)
	{
		$where = array('id_vendor', $id);
		$this->Msupport->edit_vendor('vendor', $where)->result();
	}


	public function hapus_vendor($id)
	{
		$where = array('id_vendor' => $id);
		$this->Msupport->hapus_data($where, 'vendor');
		$this->session->set_flashdata('pesan', 'Berhasil Hapus');
		redirect('Support/Vendor');
	}
	// END VENDOR
}