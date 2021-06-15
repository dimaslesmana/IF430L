<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ErrorPage extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Halaman Tidak Ditemukan";
        $this->load->view('templates/header', $data);
        $this->load->view('error');
        $this->load->view('templates/footer');
    }
}
