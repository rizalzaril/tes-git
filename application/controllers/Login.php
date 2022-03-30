<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('Mproduk');
		$this->load->library('session');
		$this->load->library('email');
		$this->load->helper('url');
	}

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Header');
			$this->load->view('Vlogin');
			$this->load->view('footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();


		// CEK USER
		if ($user) {

			// CEK USER AKTIF
			if ($user['is_active'] == 1) {

				// CEK PASSWORD
				if (password_verify($password, $user['password'])) {

					$data = [
						'email' => $user['email'],
						'role'  => $user['role_id'],
					];
					$this->session->set_userdata($data);

					if ($user['role_id'] == 1) {
						redirect('Admin');
					} else {
						redirect('petugas/Petugas');
					}
				} else {
					$this->session->set_flashdata('message', ' Wrong Password');


					redirect('Login/index');
				}
			} else {

				$this->session->set_flashdata('message', ' Sorry User Disable');
				// $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				// <strong>Holy guacamole!</strong> User Is Not Active!
				// <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				//     <span aria-hidden="true">&times;</span>
				// </button>
				// </div>');
				redirect('Login/index');
			}
		} else {
			$this->session->set_flashdata('message', ' User Not Found');
			redirect('Login/index');
		}
	}

	public function register()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules(
			'password1',
			'Password',
			'required|trim|min_length[8]|matches[password2]',
			[
				'matches' => 'Password dont match!',
				'min_length' => 'Too Short'
			]
		);
		$this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('header');
			$this->load->view('Vregister');
			$this->load->view('footer');
		} else {
			$data = [
				'name'          => htmlspecialchars($this->input->post('name', true)),
				'email'         => htmlspecialchars($this->input->post('email', true)),
				'password'      => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'image'         => $this->input->post('name'),
				'role_id'       => 2,
				'is_active'     => 1,
				'date_created'  => time()
			];

			$this->db->insert('user', $data);



			$this->session->set_flashdata('pesan', 'Register Success');
			redirect('Login/index');
		}
	}

	// private function _sendemail()
	// {
	// 	$config = [
	// 		'protocol' => 'smtp',
	// 		'smtp_host' => 'ssl://smtp.googlemail.com',
	// 		'smtp_user' => 'zaril.ziral2020@gmail.com',
	// 		'smtp_password' => '1234567890',
	// 		'smtp_port' => 465,
	// 		'mail_type' => 'html',
	// 		'charset' => 'utf-8',
	// 		'newline' => "\r\n",
	// 	];
	// 	$this->load->library('email', $config);
	// 	$this->email->from('zaril.ziral2020@gmail.com', 'Web Rizal Liyan Syah');
	// 	$this->email->to('akunisengaja.2020@gmail.com');
	// 	$this->email->subject('Testing');
	// 	$this->email->message('Hellow World');
	// 	if ($this->email->send()) {
	// 		return true;
	// 	} else {
	// 		echo $this->email->print_debugger();
	// 		die;
	// 	}
	// }

	public function logout()
	{
		unset(
			$_SESSION['email'],
			$_SESSION['role_id'],
		);

		$this->session->set_flashdata('alert', 'Congratulation');
		redirect('Login/index');
	}
}