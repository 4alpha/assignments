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
        $this->dbconn = pg_connect("host= " . $GLOBALS['HOST'] . " dbname= " . $GLOBALS['DBNAME'] . " user= " . $GLOBALS['USER'] . " password= " . $GLOBALS['PASSWORD'] . " " );
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

    public function getdepartmentstatus($query) {
      $result  = pg_query($query);
      $result = pg_fetch_all($result);
      return $result;
    }
    

    public function add($query) {
      $result = pg_query($this->dbconn,$query);
        if(pg_last_error($this->dbconn)) {
          throw new AddException(pg_last_error($this->dbconn));
        } else {
          $oid = pg_last_oid($result);
          return  $oid;
        } 
    }

    public function update($query) {
      $result = pg_query($this->dbconn,$query);
      $result = pg_affected_rows($result);
        if($result == false) {
          throw new UpdateException(pg_last_error($this->dbconn));
        } else {
          $result = pg_fetch_row($query);
          return "updated sucessfully " .  $result;
        }
    } 
    
    public function delete($query) {
      $result = pg_query($this->dbconn,$query);
      $result = pg_affected_rows($result);
        if($result == false) {
          throw new DeleteException(pg_last_error($this->dbconn));
        } else {
          $result = pg_fetch_row($query);
          return "deleted sucessfully " . $result;
        } 
    }
    public function get($query) {
      $query = pg_query($this->dbconn,$query);
      $result = pg_fetch_object($query);
      return $result->emp_no;
    } 
  }
?>