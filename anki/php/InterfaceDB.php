<?php
include_once 'Config.php';

abstract class InterfaceDB {
  
  abstract public function insert($queryInsert);
  abstract public function update($queryUpdate);
  abstract public function delete($queryDelete);
  abstract public function select($querySelectAll);
}

?>
