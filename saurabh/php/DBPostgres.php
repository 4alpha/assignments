<?php

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
          throw new Exception(pg_last_error($this->dbcon));
        }
        while($result = pg_fetch_object($get)) {
          $res = $res + print_r($result);
        }
        return $res;
      } catch (Exception $e) {
        echo $e->getMessage();
      }
    }
    public function insert($query) {
      try {  
        $result = pg_query($this->dbcon,$query);
        $cnt = pg_affected_rows($result);
        if($cnt > 0) {
          return 'Record inserted successfully';
        } else {
          throw new Exception("Record not inserted successfully".pg_last_error($this->dbcon));
        }
      } catch (Exception $e) {
        return $e->getMessage();
      }
    }
    public function update($query) {
      try {  
        $result = pg_query($this->dbcon,$query);
        $cnt = pg_affected_rows($result);
        if($cnt > 0) {
          return 'Record updated successfully';
        } else {
          throw new Exception("Record not updated successfully :".pg_last_error($this->dbcon));
        }
      } catch (Exception $e) {
        return $e->getMessage();
      }
    }
    public function delete($query) {
      try {
        $result = pg_query($this->dbcon,$query);
        $cnt = pg_affected_rows($result);      
        if($cnt > 0) {
          return 'Record deleted successfuly';
        } else {
          throw new Exception("Record not deleted successfully : id not found");
        } 
      } catch (Exception $e) {
          return $e->getMessage();
        }
    }
  }
?>