<?php
  include 'Configuration.php';

  abstract class Dao {
    function __construct() {
      $config = new Configuration();
      return $config->connection();      
    }
    abstract public function add($object);
    abstract public function get($id);
    abstract public function update($object);
    abstract public function delete($id);
    abstract public function getAll();  
  }
?>
