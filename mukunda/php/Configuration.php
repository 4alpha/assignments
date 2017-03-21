<?php
  use Database\Postgres as Postgres;
  
  $host = 'localhost';
  $port = 5432;
  $dbname = 'test';
  $user = 'postgres';
  $password = 'psql';
  
  class Configuration {
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
  }
?>
 