<?php
class Student
{
  var $Student_Id;
  var $Student_Name;
  var $Student_Nim;
  var $Student_Angkatan;
  var $Student_Jurusan;

  function __construct($sid, $sname, $snim, $sangkatan, $sjurusan)
  {
    $this->Student_Id = $sid;
    $this->Student_Name = $sname;
    $this->Student_Nim = $snim;
    $this->Student_Angkatan = $sangkatan;
    $this->Student_Jurusan = $sjurusan;
  }

  public function getStudent_Id()
  {
    return $this->Student_Id;
  }

  public function getStudent_Name()
  {
    return $this->Student_Name;
  }

  public function getStudent_Nim()
  {
    return $this->Student_Nim;
  }

  public function getStudent_Angkatan()
  {
    return $this->Student_Angkatan;
  }

  public function getStudent_Jurusan()
  {
    return $this->Student_Jurusan;
  }

  public function setStudent_Id($id)
  {
    $this->Student_Id = $id;
  }

  public function setStudent_Name($name)
  {
    $this->Student_Name = $name;
  }

  public function setStudent_Nim($nim)
  {
    $this->Student_Nim = $nim;
  }

  public function setStudent_Angkatan($angkatan)
  {
    $this->Student_Angkatan = $angkatan;
  }

  public function setStudent_Jurusan($jurusan)
  {
    $this->Student_Jurusan = $jurusan;
  }
}
