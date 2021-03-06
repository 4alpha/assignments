<?php
namespace DB_Driver;
use ExceptionClass\DatabaseConnectionError as DatabaseConnectionError;
use ExceptionClass\IDAlreadyExist as IDAlreadyExist;
use ExceptionClass\ValueNotExist as ValueNotExist;
use ExceptionClass\UpdateRecordException as UpdateRecordException;
use ExceptionClass\GetAllRecordException as GetAllRecordException;

class DBPostgres extends DB {
  private $db;
  function __construct() {
    try {
      $this->db_connect = pg_connect("host = $GLOBALS[host] dbname = $GLOBALS[dbname] user = $GLOBALS[user] password = $GLOBALS[password]");
      if ($this->db_connect == 0) 
        throw new DatabaseConnectionError("Database Could not connect.. Try Again !!");
      } catch (DatabaseConnectionError $e) {
          echo $e->getMessage();
    }
  }
  
  function insert($query) {
    $query = pg_query($this->db_connect, $query);
    if ($query == 0) {
      throw new IDAlreadyExist(pg_last_error($this->db_connect));
    } else {
      $result = pg_last_oid($query);
      return $result;
    }
  } 
 
  function update($query) {
    $query = pg_query($this->db_connect, $query);
    // $queryData = pg_affected_rows($query);
    if (pg_last_error($this->db_connect)) {
      throw new UpdateRecordException(pg_last_error($this->db_connect));
    } else {
      $result = pg_fetch_row($query);
      return $result;
    }
  }
  
  function delete($query) {
    $query = pg_query($this->db_connect, $query);
    $queryData = pg_affected_rows($query);
    if ($queryData == 0) {
      throw new ValueNotExist(pg_last_error($this->db_connect));
    } else {
        $result = pg_fetch_row($query);
        return $result;
    }
  }

  function select($query) {
    $query = pg_query($this->db_connect, $query);
    if ($query == false) {
      throw new GetAllRecordException(pg_last_error($this->db_connect));
    } else {
        return pg_fetch_all($query);
    }
  } 

  function get($query) {
    $query = pg_query($this->db_connect, $query);
    $result = pg_fetch_object($query);
    return $result->emp_no;
  }
}

?>
