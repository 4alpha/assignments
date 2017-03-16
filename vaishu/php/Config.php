<?php
   require_once 'PostgresDB.php';

  $host = localhost;
  $dbname = testdb1;
  $user = postgres;
  $password = psql;
  class Config{
    public static function getConnection() {
      $dbconn1 = parse_ini_file("/home/developer/code/assignments/vaishu/php/Config.ini");
      if($dbconn1[DBDRIVER] == 'Postgres') {
        $db = new PostgresDB();
        return $db;
      }
      elseif($dbconn1[DBDRIVER] == 'mysql') {
        $db = new mysqlDB();
        return $db;   
      }
    }
  }
?>