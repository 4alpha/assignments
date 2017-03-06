<?php
require 'DBPostgres.php';
abstract class InterfaceDAO {

  public static function getConnectToDB() {
    $db = new DBPostgres();
    return $db;
  }
  
  abstract public function addDAO();
  abstract public function updateDAO();
  abstract public function deleteDAO();
  abstract public function getAll();
}
?>