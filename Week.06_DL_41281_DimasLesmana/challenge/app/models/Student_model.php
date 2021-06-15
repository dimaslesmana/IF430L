<?php

class Student_model
{
  private $table = "students";
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllStudent()
  {
    $this->db->query("SELECT * FROM " . $this->table);

    return $this->db->resultSet();
  }

  public function getStudentById($id)
  {
    $query = "SELECT * FROM " . $this->table . " WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('id', $id);

    return $this->db->single();
  }

  public function checkLogin($data)
  {
    $query = "SELECT * FROM user WHERE email = :email";

    $this->db->query($query);
    $this->db->bind('email', $data['email']);

    $result = $this->db->single();

    if ($this->db->rowCount() > 0) {
      if (md5($data['password'] . $result['salt']) === $result['pass']) {
        $result['logged_in'] = true;
      } else {
        $result['pass_err'] = "Password anda salah.";
      }
      return $result;
    } else {
      $result['email_err'] = "Email tidak terdaftar.";
    }

    return $result;
  }

  public function insertRecord($data)
  {
    $query = "INSERT INTO " . $this->table . " (student_id, first_name, last_name, student_desc) VALUES (:student_id, :first_name, :last_name, :student_desc)";

    $this->db->query($query);
    $this->db->bind('student_id', $data['student_id']);
    $this->db->bind('first_name', $data['first_name']);
    $this->db->bind('last_name', $data['last_name']);
    $this->db->bind('student_desc', $data['student_desc']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function updateRecord($data)
  {
    $query = "UPDATE " . $this->table . " SET student_id = :student_id, first_name = :first_name, last_name = :last_name, student_desc = :student_desc WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('id', $data['id']);
    $this->db->bind('student_id', $data['student_id']);
    $this->db->bind('first_name', $data['first_name']);
    $this->db->bind('last_name', $data['last_name']);
    $this->db->bind('student_desc', $data['student_desc']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function deleteRecord($id)
  {
    $query = "DELETE FROM " . $this->table . " WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('id', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
