<?php
defined('BASEPATH') or exit('No direct script access allowed !');

class Mahasiswa extends CI_Model
{
    private $table = "mahasiswa";

    public function getAllMahasiswa()
    {
        return $this->db->get($this->table)->result_array();
    }

    public function deleteMahasiswaById($id)
    {
        $this->db->delete($this->table, ['id_mahasiswa' => $id]);
    }
}
