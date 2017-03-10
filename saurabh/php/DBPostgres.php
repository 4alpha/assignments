<?php
  require 'GetAllRecordException.php';
  require 'InsertRecordException.php';
  require 'UpdateRecordException.php';
  require 'DeleteRecordException.php';
  require 'DataBase.php';
  class DBPostgres implements DataBase {
    public $dbcon;
    function DBPostgres() {
      $this->dbcon = pg_connect("host = localhost dbname = employees user = postgres password = psql")
      or die('could not connect');
    }
    public function select($query) {
      try {
        $get = pg_query($this->dbcon,$query);
        if($get === false) {
          throw new GetAllRecordException();
        }
        while($result = pg_fetch_object($get)) {
          $res = $res + print_r($result);
        }
        return $res;
      } catch (GetAllRecordException $e) {
        return $e->getErrorMessage($this->dbcon);
      }
    }
    public function insert($query) {
      try {  
        $result = pg_query($this->dbcon,$query);
        $cnt = pg_affected_rows($result);
        if($cnt > 0) {
          return 'Record inserted successfully ';
        } else {
          throw new InsertRecordException();
        }
      } catch (InsertRecordException $e) {
        return $e->getErrorMessage($this->dbcon);
      }
    }
    public function update($query) {
      try {  
        $result = pg_query($this->dbcon,$query);
        $cnt = pg_affected_rows($result);
        if($cnt > 0) {
          return 'Record updated successfully ';
        } else {
          throw new UpdateRecordException();
        }
      } catch (UpdateRecordException $e) {
        return $e->getErrorMessage($this->dbcon);
      }
    }
    public function delete($query) {
      try {
        $result = pg_query($this->dbcon,$query);
        $cnt = pg_affected_rows($result);      
        if($cnt > 0) {
          return 'Record deleted successfuly ';
        } else {
          throw new DeleteRecordException();
        } 
      } catch (DeleteRecordException $e) {
          return $e->getErrorMessage();
        }
    }
  }
?>