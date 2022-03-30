<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Main_model extends CI_Model
{

	// Get cities
	function getCity()
	{

		$response = array();

		// Select record
		$this->db->select('*');
		$q = $this->db->get('city');
		$response = $q->result_array();

		return $response;
	}

	// Get City departments
	function getCityDepartment($postData)
	{
		$response = array();

		// Select record
		$this->db->select('id,depart_name');
		$this->db->where('city', $postData['city']);
		$q = $this->db->get('department');
		$response = $q->result_array();

		return $response;
	}

	// Get Department user
	function getDepartmentUsers($postData)
	{
		$response = array();

		// Select record
		$this->db->select('id,name,email');
		$this->db->where('department', $postData['department']);
		$q = $this->db->get('user_depart');
		$response = $q->result_array();

		return $response;
	}
}