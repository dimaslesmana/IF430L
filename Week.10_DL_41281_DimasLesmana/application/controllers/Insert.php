<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Insert extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('insert_model');
  }

  public function index()
  {
    $data = [
      'js' => $this->load->view('include/javascript', NULL, TRUE),
      'css' => $this->load->view('include/css', NULL, TRUE),
      'header' => $this->load->view('pages/header', NULL, TRUE),
      'footer' => $this->load->view('pages/footer', NULL, TRUE),
      'categories' => $this->insert_model->getCategories(),
      'suppliers' => $this->insert_model->getSuppliers()
    ];

    $this->load->view('pages/insertview', $data);
  }

  public function insert_action()
  {
    $values = [
      'product_name' => $this->input->post('product_name'),
      'qty_per_unit' => $this->input->post('qty_per_unit'),
      'price' => $this->input->post('price'),
      'id_supplier' => $this->input->post('id_supplier'),
      'id_category' => $this->input->post('id_category'),
    ];

    $this->insert_model->insert($values);

    redirect('/');
  }
}
