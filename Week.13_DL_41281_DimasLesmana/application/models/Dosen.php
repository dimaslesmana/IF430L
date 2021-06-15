<?php
defined('BASEPATH') or exit('No direct script access allowed !');

class Dosen extends CI_Model
{
    private $table = "dosen";

    public function getAllDosen()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function deleteDosenById($id)
    {
        $this->db->delete($this->table, ['id_dosen' => $id]);
    }
}
