<?php
  namespace DataBase;
  include_once 'Config.php';
  
   abstract class DB {
    public static function getConnection() {
      if($GLOBALS['DBDRIVER'] == 'postgres') {
        $db = new PostgresDB();
        return $db;
      }
      elseif($GLOBALS['DBDRIVER'] == 'mysql') {
        echo "mysql driver set";    
      }
    }
   abstract function getAll($query);
   abstract function add($query);
   abstract function delete($query);
   abstract function update($query);
}
?>