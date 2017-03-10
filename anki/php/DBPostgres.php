<?php
require 'interfaceDB.php';

class DBPostgres implements DB {

  public function __construct() {
    $db_connect = pg_connect("host=localhost dbname=testdb user=postgres password=psql");
    if(!$db_connect) {
      echo "Unable to connect..";
    } else {
      echo "Database connected successfully..<br>";
    }
     
  }
  
  function insert($queryInsert) {
    try {
      $query = pg_query($queryInsert);
      if ($query == 0) {
        throw new Exception('ID Already exist Please enter another ID or Fill all values !!');
      } else {
        $result = pg_fetch_object($query);
        return $result."<br>RECORD INSERTED SUCCESSFULLY...";
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
  function update($queryUpdate) {
    try {
      $query = pg_query($queryUpdate);
      $queryVarUpdate = pg_affected_rows($query);
      if ($queryVarUpdate == 0 ) {
         throw new Exception('Value does not exist or Fill all values !!');
      } else {
      $result = pg_fetch_row($query);
      return $result."<br>RECORD UPDATED SUCCESSFULLY...";
      }
    }
    catch (Exception $e) {
    echo $e->getMessage();
    }
  }

  function delete($queryDelete) {
    try {
      $query = pg_query($queryDelete);
      $queryVarDelete = pg_affected_rows($query);
      if($queryVarDelete == 0) {
        throw new Exception('ID does not exist Please try again or Fill all values !!');
      } else {
          $result = pg_fetch_row($query);
          return $result."<br>RECORD DELETED SUCCESSFULLY...";
      }
    } catch(Exception $e) {
      echo $e->getMessage();
    }
  }  

  function select($querySelectAll) {
    try {
      $query = pg_query($querySelectAll);
      if ($query == false) {
        throw new Exception('Record Not Found..:(');
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