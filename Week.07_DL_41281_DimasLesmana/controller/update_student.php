<?php
if (isset($_POST['submit'])) {
  $sid = mysqli_real_escape_string($conn, strip_tags($_POST['sid']));
  $sname = mysqli_real_escape_string($conn, strip_tags($_POST['sname']));
  $snim = mysqli_real_escape_string($conn, strip_tags($_POST['snim']));
  $sangkatan = mysqli_real_escape_string($conn, strip_tags($_POST['sangkatan']));
  $sjurusan = mysqli_real_escape_string($conn, strip_tags($_POST['sjurusan']));

  $query = 'UPDATE siswa SET Student_Name="' . $sname . '", Student_Nim="' . $snim . '", Student_Angkatan="' . $sangkatan . '", Student_Jurusan="' . $sjurusan . '" WHERE Student_Id="' . $sid . '";';
  $result = $conn->query($query);
}
