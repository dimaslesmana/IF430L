<?php

class Home_model extends CI_Model
{

  public function getProducts()
  {
    return $this->db->get('product')->result_array();
  }
}
