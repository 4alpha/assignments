<?php
  namespace DB_Driver;
  
  abstract class  DB {
    public static $db;

    static function getConnection() {                
      if($GLOBALS['driver'] == 'POSTGRES') {
        $db = new Postgres();
        return $db;
      }
      if($GLOBALS['driver'] == 'MYSQL') {
        $db = new Mysql();
        return $db;
      }
    }
    abstract protected function get($query);
    abstract protected function getAll($query);
    abstract protected function insert($query);
    abstract protected function update($query);
    abstract protected function delete($query);
  }
?>