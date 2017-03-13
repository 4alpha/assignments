<?php
  include_once 'DBPostgres.php';
  abstract class Database {
    static function getDatabaseConnection() {
      $parsedFile = parse_ini_file("config.ini");
      if($parsedFile['DRIVER']=='Postgres') {
        $dbpostgres = new DBPostgres();
        return $dbpostgres;
      } else {
        return 'Driver not found';
      }
    }
    
  abstract public function select($query);
  abstract public function insert($query);
  abstract public function update($query);
  abstract public function delete($query);
}
?>