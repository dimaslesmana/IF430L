<?php

if (isset($_POST['loc'])) {
  $loc = $_POST['loc'];
} else {
  $loc = 'student_data.php';
}

include 'include/db_connect.php';
include 'model/User.php';
include 'model/Student.php';

if (isset($_POST['do'])) {
  include 'controller/' . $_POST['do'];
}

include 'view/' . $loc;
include 'include/db_disconnect.php';
