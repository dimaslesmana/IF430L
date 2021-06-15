<?php 

class Home_model extends CI_Model {

  public function getAllEmployee() {
    return $this->db->get('employee')->result_array();
  }
}