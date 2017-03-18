<?php
namespace DatabaseFiles;
use ExceptionClass\DatabaseConnectionError as DatabaseConnectionError;
use ExceptionClass\IDAlreadyExist as IDAlreadyExist;
use ExceptionClass\ValueNotExist as ValueNotExist;

class DBPostgres extends DB {
  public $db;
  public function __construct() {
    try {
      $this->db_connect = pg_connect("host = $GLOBALS[host] dbname = $GLOBALS[dbname] user = $GLOBALS[user] password = $GLOBALS[password]");
      if($this->db_connect == 0) 
        throw new DatabaseConnectionError();
      } catch(DatabaseConnectionError $e) {
          return $e->getMessage3();
    }
  }
  
  function insert($queryInsert) {
    $query = pg_query($this->db_connect, $queryInsert);
    if ($query == 0) {
      throw new IDAlreadyExist();
    } else {
      $result = pg_fetch_object($query);
      return $result;
    }
  } 
 
  function update($queryUpdate) {
    $query = pg_query($this->db_connect, $queryUpdate);
    $queryData = pg_affected_rows($query);
    if ($queryData == 0 ) {
      throw new ValueNotExist();
    } else {
      $result = pg_fetch_row($query);
      return $result;
    }
  }
  
  function delete($queryDelete) {
    $query = pg_query($this->db_connect, $queryDelete);
    $queryData = pg_affected_rows($query);
    if($queryData == 0) {
      throw new ValueNotExist();
    } else {
        $result = pg_fetch_row($query);
        return $result;
    }
  }

  function select($querySelectAll) {
    $query = pg_query($this->db_connect, $querySelectAll);
    if ($query == false) {
      throw new Exception();
    } else {
        return pg_fetch_all($query);
    }
  }  
}

?>
