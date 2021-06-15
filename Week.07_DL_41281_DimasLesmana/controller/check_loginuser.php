<?php
$valid;

if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($conn, strip_tags($_POST['username']));
  $password = mysqli_real_escape_string($conn, strip_tags($_POST['password']));

  $query = 'SELECT * FROM user WHERE username="' . $username . '";';
  $result = $conn->query($query);

  if ($result != false) {
    $match = $result->fetch_assoc();
    $user = new User($match['username'], $match['password'], $match['salt']);

    if (strtolower($user->getPassword()) === strtolower(md5($password . $user->getSalt()))) {
      $valid = true;
    } else {
      $valid = false;
    }
  }
} else {
  $valid = false;
}
