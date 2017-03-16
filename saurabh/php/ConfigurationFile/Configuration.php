<?php
  namespace ConfigurationFile;
  use DatabaseFiles\DBPostgres as DBPOstgres;
  
  class Configuration {
    static function getDatabaseConnection() {
      $parsedFile = parse_ini_file("config.ini");
      if($parsedFile['DRIVER']=='Postgres') {
        $dbpostgres = new DBPostgres();
        return $dbpostgres;
      } else {
        return 'Driver not found';
      }
    }
  }
?>