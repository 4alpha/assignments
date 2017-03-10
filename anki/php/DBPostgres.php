<?php
require 'interfaceDB.php';

class IDAlreadyExist extends Exception {
  public function getMessageForID() {
  echo "ID Already exist Please enter another ID or Fill all values !!";
  }
}

class ValueNotExist extends Exception {
  public function valueNotExist() {
    echo "ID does not exist or Fill all values !!";
  }
}

class DBPostgres implements DB {

  public function __construct() {
    $this->db_connect = pg_connect("host=localhost dbname=testdb user=postgres password=psql") or die("unable to connect");
  }
  
  function insert($queryInsert) {
    try {
      $query = pg_query($queryInsert);
      if ($query == 0) {
        throw new IDAlreadyExist;
      } else {
        $result = pg_fetch_object($query);
        return $result."<br>RECORD INSERTED SUCCESSFULLY...";
      }
    } catch (IDAlreadyExist $e) {
      echo $e->getMessageForID();
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
      return $result."<br>RECORD UPDATED SUCCESSFULLY...";
      }
    }
    catch (ValueNotExist $e) {
    echo $e->valueNotExist();
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
          return $result."<br>RECORD DELETED SUCCESSFULLY...";
      }
    } catch(ValueNotExist $e) {
      echo $e->valueNotExist();
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