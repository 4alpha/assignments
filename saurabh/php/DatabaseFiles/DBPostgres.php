<?php
  namespace DatabaseFiles;
  
  use AppExceptions\DatabaseConnectionException as DatabaseConnectionException;
  use AppExceptions\GetAllRecordException as GetAllRecordException;
  use AppExceptions\InsertRecordException as InsertRecordException;
  use AppExceptions\UpdateRecordException as UpdateRecordException;
  use AppExceptions\DeleteRecordException as DeleteRecordException;
  
  class DBPostgres extends Database {
    public $dbconnection;
    function __construct() {
      try {
        $this->dbconnection = pg_connect("host = $GLOBALS[host] dbname = $GLOBALS[dbname] user = $GLOBALS[user] password = $GLOBALS[password]");
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
        if(empty($finalResult)) {
          return 'Records not found, table is empty';
        } else {
          return $finalResult;
        }
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
          return $e->getErrorMessage($this->dbconnection);
        }
    }
    
  }
?>