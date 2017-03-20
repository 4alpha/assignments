<?php
  namespace DataBase;
  
  use DisplayException\DatabaseConnectionException as DatabaseConnectionException;
  use DisplayException\DeleteException as DeleteException;
  use DisplayException\AddException as AddException;
  use DisplayException\UpdateException as UpdateException;

  class PostgresDB  extends DB {
    public $dbconn;

    function __construct() {
      try {
        $this->dbconn = pg_connect("host= " . $GLOBALS['host'] . " dbname= " . $GLOBALS['dbname'] . " user= " . $GLOBALS['user'] . " password= " . $GLOBALS['password'] . " " );
        if($this->dbconn == 0) { 
          throw new  DatabaseConnectionException;
        } else {
        return "Opened database through postgresdb\n<br>";
        }
      } catch( DatabaseConnectionException $e) {
        return $e->connectionDie();
      }
    }

    public function getAll($query) {
      $result = pg_query($query);
      $result = pg_fetch_all($result);
      return $result;
    }

    public function add($query) {
      $result = pg_query($this->dbconn,$query);
        if(pg_last_error($this->dbconn)) {
          throw new AddException;
        } else {
          $result = pg_fetch_object($query);
          return  $result;
        } 
    }

    public function update($query) {
      $result = pg_query($this->dbconn,$query);
      $cmdtuples = pg_affected_rows($result);
        if($cmdtuples == false) {
          throw new UpdateException;
        } else {
          $result = pg_fetch_row($query);
          return  $result;
        }
    } 
    
    public function delete($query) {
      $result = pg_query($this->dbconn,$query);
      $cmdtuples = pg_affected_rows($result);
        if($cmdtuples == false) {
          throw new DeleteException;
        } else {
          $result = pg_fetch_row($query);
          return $result;
        } 
    } 
  }
?>