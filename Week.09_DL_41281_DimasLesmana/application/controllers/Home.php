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
    $data['js'] = $this->load->view('include/javascript.php', NULL, TRUE);
    $data['css'] = $this->load->view('include/css.php', NULL, TRUE);
    $data['header'] = $this->load->view('pages/header.php', NULL, TRUE);
    $data['footer'] = $this->load->view('pages/footer.php', NULL, TRUE);
    $data['employees'] = $this->home_model->getAllEmployee();

    foreach ($data['employees'] as &$item) {
      $item['gaji'] = "Rp. " . number_format($item['gaji'],0,'','.');
    }

		$this->load->view('pages/home.php', $data);
	}
}
