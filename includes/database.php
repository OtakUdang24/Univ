<?php
/**
 *
 */
class Database
{
  public $con;
  private $sql;

  function __construct()
  {
    $con = new Con("localhost", "root", "", "Univ");
    $this->con = $con->getConnection();
  }
  public function getConnection()
  {
    return $this->con;
  }
  public function query($sql)
  {
    $this->sql = $sql;
  }
  public function insert($tableName, $params = array())
  {
    $total = count($params);
    $a = 0;
    $this->sql = "INSERT INTO ".$tableName." (";
    foreach ($params as $key => $value) {
      $a++;
      $this->sql .= $key;
      if ($a < $total) {
        $this->sql .= ', ';
      }else {
        $this->sql .= ')';
      }
    }
    $a = 0;
    $this->sql .= " VALUES (";
    foreach ($params as $key => $value) {
      $a++;
      $this->sql .= '?';
      if ($a < $total) {
        $this->sql .= ', ';
      }else {
        $this->sql .= ')';
      }
    }
    return $this->sql;
    }

    public function getWhere($tableName, $where = array())
    {
      $this->sql = "SELECT * FROM ".$tableName." WHERE ";
      $i = 0;
      foreach ($where as $key => $value) {
        $i++;
        $this->sql .= $key.' = '.' ?';
        if ($i < count($where)) {
          $this->sql .= ' AND ';
        }
      }
      return $this->sql;
    }

    public function execute()
    {
      $query = $this->con->query($this->sql);
      return new ResultSet($query);
    }

}
$db = new Database();
// $db = new Database();
// echo "<pre>";
// print_r($db->getConnection());
// echo "</pre>";

// $arrayName = array(
//   'col1' => 'col1',
//   'col2' => 'col2',
//   'col3' => 'col3'
// );
// echo $db->insert("univ", $arrayName);
// $db->execute();















 ?>
