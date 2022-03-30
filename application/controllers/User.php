<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index(){

		// load base_url
		$this->load->helper('url');

		//load model
		$this->load->model('Main_model');

		// get cities
		$data['cities'] = $this->Main_model->getCity();

		// load view
		$this->load->view('user_view',$data);
	}

	public function getCityDepartment(){
		// POST data
		$postData = $this->input->post();

		//load model
		$this->load->model('Main_model');

		// get data
		$data = $this->Main_model->getCityDepartment($postData);

		echo json_encode($data);
	}

	public function getDepartmentUsers(){
		// POST data
		$postData = $this->input->post();

		//load model
		$this->load->model('Main_model');

		// get data
		$data = $this->Main_model->getDepartmentUsers($postData);

		echo json_encode($data);
	}

}
