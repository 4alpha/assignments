<?php
// require_once 'DBPostgres.php';

  $GLOBALS['host'] = "localhost"; 
  $GLOBALS['dbname'] = "testdb"; 
  $GLOBALS['user'] = "postgres"; 
  $GLOBALS['password'] = "psql";

class Config {
  public static function getConnectToDB() {
    $file = parse_ini_file('config.ini'); 
    echo "<br>";
    if($file['DBDRIVER'] == Postgres) {
      $db = new DBPostgres();
      return $db;
    } elseif($file['DBDRIVER'] == Mysql) {
      return 0;
    }
  }
}
?>
