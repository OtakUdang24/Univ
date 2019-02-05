<?php
session_start();
include 'config.php';
require 'includes/user.php';

if (isset($_POST['login'])) {
  $where = array(
    'username' => $_POST['username']
  );
  $request = array(
    'username' => $_POST['username'],
    'password' => $_POST['password']
  );
  $user = new user($db->getConnection(), $db->getWhere('users', $where), $request);
  $user->login();
}elseif (isset($_POST['signup'])) {
  echo "ok";
}




 ?>
