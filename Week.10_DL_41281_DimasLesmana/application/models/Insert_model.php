<?php

class Insert_model extends CI_Model
{

  public function insert($values)
  {
    $this->db->insert('product', $values);
  }

  public function getCategories()
  {
    return $this->db->get('category')->result_array();
  }
  
  public function getSuppliers()
  {
    return $this->db->get('supplier')->result_array();
  }
}
