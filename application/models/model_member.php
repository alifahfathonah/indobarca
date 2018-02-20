<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_member extends CI_Model {

	public function get_member($where = ""){		
		$data = $this->db->query("select * from member ".$where);
		return $data->result_array();
		//kembalikan datanya agar bisa dibaca oleh controller
	}

	public function insert_data($table, $data){
		$temp = $this->db->insert($table, $data);
		return $temp; 
	}

	public function update_data($table, $data, $where){
		$temp = $this->db->update($table, $data, $where);
		return $temp;
	}

	public function delete_data($table, $where){
		$temp = $this->db->delete($table, $where);
		return $temp;
	}
	//parameter ditentukan oleh controller (berarti dari controller) !.
}