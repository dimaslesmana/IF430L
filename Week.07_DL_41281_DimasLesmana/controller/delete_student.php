<?php
if (isset($_POST['submit'])) {
  $sid = mysqli_real_escape_string($conn, strip_tags($_POST['Student_Id']));
  $query = 'DELETE FROM siswa WHERE Student_Id="' . $sid . '";';
  $result = $conn->query($query);
}
