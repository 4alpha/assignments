<?php
use DatabaseFiles\DBPostgres;

  $iniFile = parse_ini_file('config.ini');
  $DBDRIVER = $iniFile['DBDRIVER']; 
  $host = $iniFile['host']; 
  $dbname = $iniFile['dbname']; 
  $user = $iniFile['user'];
  $password = $iniFile['password'];
  class Config {
    public static function getConnectToDB() {
      if($GLOBALS['DBDRIVER'] == Postgres) {
      $db = new DBPostgres();
      return $db;
      } elseif($GLOBALS['DBDRIVER'] == Mysql) {
        return 0;
      }
    }
  }
?>
