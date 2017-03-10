<?php
require 'DBPostgres.php';

abstract class InterfaceDAO {
  public static function getConnectToDB() {
    $file = parse_ini_file('config.ini'); 
    // print_r($file);
    echo "<br>";
    if($file['DBDRIVER']==Postgres) {
      $db = new DBPostgres();
      return $db;
    } elseif($file['DBDRIVER']==Mysql) {
      return 0;
    }
  }
  
  abstract public function addDAO($obj);
  abstract public function updateDAO($obj);
  abstract public function deleteDAO($obj);
  abstract public function getAll();
}
?>