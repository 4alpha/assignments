<?php
require_once 'InterfaceDB.php';
require_once 'DatabaseConnectionError.php';
require_once 'ValueNotExist.php';
require_once 'IDAlreadyExist.php';

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
    try {
      $query = pg_query($queryInsert);
      if ($query == 0) {
        throw new IDAlreadyExist;
      } else {
        $result = pg_fetch_object($query);
        return $result." Record inserted successfully !!";
      }
    } catch (IDAlreadyExist $e) {
      return $e->getMessageForID();
    }
  }

  function update($queryUpdate) {
    try {
      $query = pg_query($queryUpdate);
      $queryVarUpdate = pg_affected_rows($query);
      if ($queryVarUpdate == 0 ) {
         throw new ValueNotExist;
      } else {
      $result = pg_fetch_row($query);
      return $result." Record updated successfully !!";
      }
    }
    catch (ValueNotExist $e) {
    return $e->valueNotExist();
    }
  }

  function delete($queryDelete) {
    try {
      $query = pg_query($queryDelete);
      $queryVarDelete = pg_affected_rows($query);
      if($queryVarDelete == 0) {
        throw new ValueNotExist;
      } else {
          $result = pg_fetch_row($query);
          return $result." Record deleted successfully !!";
      }
    } catch(ValueNotExist $e) {
      return $e->valueNotExist();
    }
  }  

  function select($querySelectAll) {
    try {
      $query = pg_query($this->db_connect,$querySelectAll);
      if ($query == false) {
        throw new Exception(pg_last_error($this->db_connect));
      } else {
        while($result = pg_fetch_object($query)){
          print_r($result);
        }
        return $result;
      }
    } catch(Exception $e) {
      echo $e->getMessage();
    }  
  }
}

?>