<?php
/**
 *
 */
class ResultSet
{

  private $query = array();
  private $data;

  function __construct($query, $data)
  {
    $this->$query = $query;
    $this->data   = $data;
  }

  // data array, hasil query select where table users untuk login
  public function toArray()
  {
    $email = "asd";
    $stmt = $this->$query;
    $stmt->execute([$email]);
    $user = $stmt->fetch();
  }
}

 ?>
