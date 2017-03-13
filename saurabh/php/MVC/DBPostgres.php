<?php
  require_once 'GetAllRecordException.php';
  require_once 'InsertRecordException.php';
  require_once 'UpdateRecordException.php';
  require_once 'DeleteRecordException.php';
  require_once 'DatabaseConnectionException.php';
  include_once 'Database.php';
  class DBPostgres extends Database {
    public $dbconnection;
    function __construct() {
      try {
        $this->dbconnection = pg_connect("host = localhost dbname = employees user = postgres password = psql");
        if($this->dbconnection == 0) {
          throw new DatabaseConnectionException();
        }
      } catch(DatabaseConnectionException $e) {
        echo $e->getErrorMessage($this->dbconnection);
      }
    }

    public function select($query) {
      try {
        $result = pg_query($this->dbconnection,$query);
        if($result === false) {
          throw new GetAllRecordException();
        }
        while($resultSet = pg_fetch_object($result)) {
          $finalResult = $res + print_r($resultSet);
        }
        return $finalResult;
      } catch (GetAllRecordException $e) {
        return $e->getErrorMessage($this->dbconnection);
      }
    }
    
    public function insert($query) {
      try {  
        $result = pg_query($this->dbconnection,$query);
        $affectedRow = pg_affected_rows($result);
        if($affectedRow > 0) {
          return 'Record inserted successfully ';
        } else {
          throw new InsertRecordException();
        }
      } catch (InsertRecordException $e) {
        return $e->getErrorMessage($this->dbconnection);
      }
    }
    
    public function update($query) {
      try {  
        $result = pg_query($this->dbconnection,$query);
        $affectedRow = pg_affected_rows($result);
        if($affectedRow > 0) {
          return 'Record updated successfully ';
        } else {
          throw new UpdateRecordException();
        }
      } catch (UpdateRecordException $e) {
        return $e->getErrorMessage($this->dbconnection);
      }
    }
    
    public function delete($query) {
      try {
        $result = pg_query($this->dbconnection,$query);
        $affectedRow = pg_affected_rows($result);      
        if($affectedRow > 0) {
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