<?php
class Login_admin_model extends CI_Model{

  public function get_single_row($tbl='',$wh=array()){ 

		$this->db->where($wh);
		$query = $this->db->get($tbl);
				
		return $query->row();
	
	}// get_single_row function end here!
	
}