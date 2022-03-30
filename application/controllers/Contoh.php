<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contoh extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mproduk');
    }
	
	public function index()
	{
        $data['produk'] = $this->Mproduk->get_produk();
		

        $db = $this->Mproduk->cekkodeproduk();

        $nourut = substr($db, 5, 6); 
        $kdbarangskrng= $nourut +1 ;
        $data = array('kode_produk' => $kdbarangskrng);
        $this->load->view('contoh', $data);

	}
}
