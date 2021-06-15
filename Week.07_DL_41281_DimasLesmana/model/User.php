<?php
class User
{
  var $username;
  var $password;
  var $salt;

  function __construct($uname, $pass, $salt)
  {
    $this->username = $uname;
    $this->password = $pass;
    $this->salt = $salt;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function getSalt()
  {
    return $this->salt;
  }

  public function setUsername($uname)
  {
    $this->username = $uname;
  }

  public function setPassword($pass)
  {
    $this->password = $pass;
  }

  public function setSalt($salt)
  {
    $this->salt = $salt;
  }
}
