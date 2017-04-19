<?php
  namespace Database;

  abstract class Database {
    public static function connection() {
      if($GLOBALS['driver'] == 'postgres') {
        $db = new Postgres();            
        return $db;
      }
      if($GLOBALS['dbdriver'] == 'mysql') {
        $db = new Postgres();
        return $db;
      }
    }   
    abstract public function add($query);
    abstract public function get($query);
    abstract public function update($query);
    abstract public function delete($query);
    abstract public function getAll($query);  
  }
?>