<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cmahasiswa extends CI_Controller {

	public function tampil()
	{
		$this->load->view("vmahasiswa");
	}
	
	public function index()
	{
		$this->tampil();
    }
    

    //isi cmb kodematkul
	public function fill_matkul(){
	  $this->load->model("Mmahasiswa");
      $x = $this->Mmahasiswa->get_mhs();
  	  foreach($x as $r)
	  {
         echo "<option value=$r->kode_mk>$r->kode_mk";
               
      }
  	}

	public function getmatkul()
	{
	  $kodemk = $this->input->post("x");
	  $this->load->model("Mmahasiswa");
	  $x = $this->Mmahasiswa->get_Data("matakuliah","kode_mk",$kodemk);
	  $myObj = new stdClass() ;
	  foreach($x as $r)
	  {
	        $myObj->km = $r->kode_mk;
			$myObj->mk = $r->mata_kuliah;

			

			echo json_encode($myObj);
	  }
	}

	public function isi_mhs()
	{
		$this->load->model("Mmahasiswa");
      	$x = $this->Mmahasiswa->get_ListMhs();
  	  	foreach($x as $r)
	  {
         echo "<option value=$r->nim>$r->nim";
               
      }
	}


	public function getnama()
	{
	  $nim = $this->input->post("x");
	  $this->load->model("Mmahasiswa");
	  $x = $this->Mmahasiswa->get_Data("mahasiswa","nim",$nim);
	  $myObj = new stdClass() ;
	  foreach($x as $r)
	  {
	        $myObj->nim = $r->nim;
			$myObj->nama = $r->nama_mahasiswa;
			

			echo json_encode($myObj);
	  }
	}




 
}	

?>
