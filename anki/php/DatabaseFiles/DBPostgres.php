<?php
namespace DatabaseFiles;
use ExceptionClass\DatabaseConnectionError as DatabaseConnectionError;
use ExceptionClass\IDAlreadyExist as IDAlreadyExist;
use ExceptionClass\ValueNotExist as ValueNotExist;

class DBPostgres extends InterfaceDB {
  public $db;
  public function __construct() {
    try {
      $this->db_connect = pg_connect("host = $GLOBALS[host] dbname = $GLOBALS[dbname] user = $GLOBALS[user] password = $GLOBALS[password]");
      if($this->db_connect == 0) 
        throw new DatabaseConnectionError();
      } catch(DatabaseConnectionError $e) {
          return $e->getDatbaseError();
    }
  }
  
  function insert($queryInsert) {
    $query = pg_query($this->db_connect, $queryInsert);
    if ($query == 0) {
      throw new IDAlreadyExist();
    } else {
      $result = pg_fetch_object($query);
    }
  } 
 
  function update($queryUpdate) {
    $query = pg_query($this->db_connect, $queryUpdate);
    $queryData = pg_affected_rows($query);
    if ($queryData == 0 ) {
      throw new ValueNotExist();
    } else {
      $result = pg_fetch_row($query);
    }
  }
  
  function delete($queryDelete) {
    $query = pg_query($this->db_connect, $queryDelete);
    $queryData = pg_affected_rows($query);
    if($queryData == 0) {
      throw new ValueNotExist();
    } else {
        $result = pg_fetch_row($query);
    }
  }

  function select($querySelectAll) {
    $query = pg_query($this->db_connect, $querySelectAll);
    if ($query == false) {
      throw new Exception(pg_last_error($this->db_connect));
    } else {
      while($result = pg_fetch_object($query)){
        print_r($result);
      }
    }
  }  
  
}

?>
