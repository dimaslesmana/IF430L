<?php
defined('BASEPATH') or exit('No direct script access allowed !');

class Admin extends CI_Model
{
    private $table = "admin";

    public function getAdminByEmail($email)
    {
        return $this->db->get_where($this->table, ['email_admin' => $email])->row_array();
    }
}
