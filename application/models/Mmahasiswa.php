<?php
class Mmahasiswa extends CI_Model {
	public function get_mhs()
	{
	 $sql="Select * from matakuliah" ;
	 $query = $this->db->query($sql);
     return $query->result();
	}
	
	public function get_Data($table,$field,$criteria)
	{
	 $sql = "Select * from $table where $field = '$criteria'" ;
	 $query = $this->db->query($sql);
	 return $query->result();
	}	

	public function get_ListMhs()
	{
	 $sql="Select * from mahasiswa" ;
	 $query = $this->db->query($sql);
     return $query->result();
	}



 
}
?>