<?php
  namespace Database;

  abstract class Database {
    public static function connection() {
      $ini = parse_ini_file("config.ini");
      if($ini['dbdriver'] == 'postgres') {
        $db = new Postgres();            
        return $db;
      }
      if($ini['dbdriver'] == 'mysql') {
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