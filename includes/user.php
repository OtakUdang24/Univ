<?php

include "includes/database.php";
/**
 *
 */
class user
{
  private $db;
  private $sql;
  private $request;


  function __construct($db, $sql, $req)
  {
    $this->db   = $db;
    $this->sql  = $sql;
    $this->request  = $req;
  }

  public function login(){
    $stmt = $this->db->prepare($this->sql);
    $uname = $this->request['username'];
    $stmt->execute([$uname]);

    $user = $stmt->fetchAll();

    if (count($user) == 1) {
      if (password_verify($this->request['password'], $user[0]['password'])) {
        $_SESSION['name'] = $user[0]['name'];
        $_SESSION['email'] = $user[0]['email'];
        $_SESSION['login'] = true;
        header('Location: http://localhost/Univ');
      }else {
        $_SESSION['checkPassword'] = " Password Salah ";
        header('Location: http://localhost/Univ/views/sign-in.php');
      }
    }else {
      $_SESSION['checkUser'] = " Email tidak ada ";
      header('Location: http://localhost/Univ/views/sign-in.php');
    }
  }

  public function register()
  {
    $stmt = $this->db->prepare($this->sql);
    // hubungkan data dengan variabel (bind)
    $a = 0;
    $stmt->bindParam(1, $name);
    $stmt->bindParam(2, $email);
    $stmt->bindParam(3, $password);
    $stmt->bindParam(4, $id_level);

    // siapkan "data" query
    $name     = $this->request['name'];
    $email    = $this->request['email'];
    $password = password_hash($this->request['password'], PASSWORD_DEFAULT);
    $id_level = 1;

    return $this->execute($stmt);
  }
  private function execute($stmt)
  {
    // jalankan query (execute)
    return $stmt->execute();
  }
}


 ?>
