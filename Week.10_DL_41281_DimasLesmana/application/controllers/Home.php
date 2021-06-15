<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('home_model');
  }

	public function index()
	{
    $data = [
      'js' => $this->load->view('include/javascript', NULL, TRUE),
      'css' => $this->load->view('include/css', NULL, TRUE),
      'header' => $this->load->view('pages/header', NULL, TRUE),
      'footer' => $this->load->view('pages/footer', NULL, TRUE),
      'products' => $this->home_model->getProducts()
    ];

		$this->load->view('pages/homeview', $data);
	}
}
