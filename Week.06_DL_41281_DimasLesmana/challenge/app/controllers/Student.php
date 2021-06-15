<?php

class Student extends Controller
{
  public function index()
  {
    $_SESSION['students'] = $this->model('Student_model')->getAllStudent();
    $_SESSION['status']['email_err'] = "";
    $_SESSION['status']['pass_err'] = "";

    if (!isset($_SESSION['status']['logged_in'])) {
      $_SESSION['status']['logged_in'] = false;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->validateForm();
      $this->doLogin();
    }

    $this->view('student/index');
  }

  public function add()
  {
    $_SESSION['status']['student_id_err'] = "";
    $_SESSION['status']['first_name_err'] = "";
    $_SESSION['status']['last_name_err'] = "";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->validateForm();
      $this->addStudent();
    }

    $this->view('student/add_student');
  }

  public function edit($id = null)
  {
    $_SESSION['status']['student_id_err'] = "";
    $_SESSION['status']['first_name_err'] = "";
    $_SESSION['status']['last_name_err'] = "";

    $data = $this->model('Student_model')->getStudentById($id);
    if (is_null($data['id'])) {
      header("Location: " . BASEURL);
      exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $this->validateForm();
      $this->editStudent();
    }

    $this->view('student/edit_student', $data);
  }

  public function delete($id = null)
  {
    $this->model('Student_model')->deleteRecord($id);
    header("Location: " . BASEURL);
    exit;
  }

  private function validateForm()
  {
    /* Login form */
    if (isset($_POST['email']) && isset($_POST['password'])) {
      if (empty(trim($_POST['email']))) {
        $_SESSION['status']['email_err'] = "Mohon masukkan email anda.";
      }

      if (empty(trim($_POST['password']))) {
        $_SESSION['status']['pass_err'] = "Mohon masukkan password anda.";
      }
    }

    /* Add and Edit form */
    if (isset($_POST['student_id']) && isset($_POST['first_name']) && isset($_POST['last_name'])) {
      if (empty(trim($_POST['student_id']))) {
        $_SESSION['status']['student_id_err'] = "Student ID cannot be empty.";
      } elseif (strlen(trim($_POST['student_id'])) > 12) {
        $_SESSION['status']['student_id_err'] = "Student ID is too long. <i>(Max 12 characters)</i>";
      }

      if (empty(trim($_POST['first_name']))) {
        $_SESSION['status']['first_name_err'] = "First name cannot be empty.";
      }

      if (empty(trim($_POST['last_name']))) {
        $_SESSION['status']['last_name_err'] = "Last name cannot be empty.";
      }
    }
  }

  private function doLogin()
  {
    /* Proceed if we have no error */
    if (empty($_SESSION['status']['email_err']) && empty($_SESSION['status']['pass_err'])) {
      $data = $this->model('Student_model')->checkLogin($_POST);

      if (isset($data['logged_in'])) {
        $_SESSION['status']['logged_in'] = $data['logged_in'];
      }

      if (isset($data['email_err'])) {
        $_SESSION['status']['email_err'] = $data['email_err'];
      }

      if (isset($data['pass_err'])) {
        $_SESSION['status']['pass_err'] = $data['pass_err'];
      }
    }
  }

  private function addStudent()
  {
    /* Proceed if we have no error */
    if (empty($_SESSION['status']['student_id_err']) && empty($_SESSION['status']['first_name_err']) && empty($_SESSION['status']['last_name_err'])) {
      if ($this->model('Student_model')->insertRecord($_POST) > 0) {
        header("Location: " . BASEURL);
        exit;
      }
    }
  }

  private function editStudent()
  {
    /* Proceed if we have no error */
    if (empty($_SESSION['status']['student_id_err']) && empty($_SESSION['status']['first_name_err']) && empty($_SESSION['status']['last_name_err'])) {
      if ($this->model('Student_model')->updateRecord($_POST) > 0) {
        header("Location: " . BASEURL);
        exit;
      }
    }
  }
}
