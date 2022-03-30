<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Mproduk');
		$this->load->library('session');
		if (!$this->session->userdata('email')) {
			redirect('Login');
		}
	}

	public function index()
	{
		// Tampilkan jumalh row pada table
		$user_data = $this->db->query("SELECT * FROM user");
		$data['user_total'] = $user_data->num_rows();
		// end
		// Tampilkan jumalh row pada table
		$produk = $this->db->query("SELECT * FROM produk");
		$data['produk_total'] = $produk->num_rows();
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('Header');
		$this->load->view('sidebar', $data);
		$this->load->view('content', $data);
		$this->load->view('footer');
	}

	public function register()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user, email]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header');
			$this->load->view('Admin/Vregister');
			$this->load->view('footer');
		} else {
			$data = [
				'name'          => htmlspecialchars($this->input->post('name', true)),
				'email'         => htmlspecialchars($this->input->post('email', true)),
				'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'image'         => 'default.jpg',
				'role_id'       => 1,
				'is_active'     => 1,
				'date_created'  => time()
			];
			$this->db->insert('user', $data);
			redirect('Admin');
		}
	}
}