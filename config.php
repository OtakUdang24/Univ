<?php
/**
 *
 */
class Con
{
  private $host;
  private $user;
  private $pass;
  private $dbname;
  private $con;

  public function __construct($host,$user,$pass,$dbname) {
    $this->host = $host;
    $this->user = $user;
    $this->pass = $pass;
    $this->dbname = $dbname;
  }

  public function getConnection()
  {
    // $dsn = "mysql:host=self::host;dbname=self::dbname;charset=utf8mb4";
    $options = [
      PDO::ATTR_ERRMODE             => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_ASSOC,
      PDO::ATTR_EMULATE_PREPARES    => false,
    ];
    try{
      $pdo = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass, $options);
      return $pdo;
    }catch(\PDOException $e){
      echo "Koneksi Gagal! : ".$e;
    }
  }


}











 ?>
