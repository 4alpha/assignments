<?php
  namespace databases;
    
  abstract class Database {
    static function getDatabaseConnection() {
      $parsedFile = parse_ini_file("config.ini");
      $GLOBALS['driver'] = $parsedFile['DRIVER'];
      $GLOBALS['host'] = $parsedFile['HOST'];
      $GLOBALS['dbname'] = $parsedFile['DBNAME'];
      $GLOBALS['user'] = $parsedFile['USER'];
      $GLOBALS['password'] = $parsedFile['PASSWORD'];
      if($GLOBALS['driver'] =='Postgres') {
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