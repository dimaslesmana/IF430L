<?php
if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($conn, strip_tags($_POST['username']));
  $salt = mysqli_real_escape_string($conn, strip_tags($_POST['salt']));
  $password = mysqli_real_escape_string($conn, strip_tags($_POST['password']));
  $passconf = mysqli_real_escape_string($conn, strip_tags($_POST['passconf']));

  if ($username !== "" && $password === $passconf) {
    $query = 'INSERT INTO user VALUES("' . $username . '", "' . md5($password . $salt) . '", "' . $salt . '");';
    $result = $conn->query($query);
  }
}
