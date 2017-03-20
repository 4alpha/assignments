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
      $result = pg_query($this->dbconnection,$query);
      if($result === false)
        throw new GetAllRecordException(pg_last_error($this->dbconnection));
      return $result;
    }
    
    public function insert($query) {
      $result = pg_query($this->dbconnection,$query);
      $affectedRows = pg_affected_rows($result);
      if($affectedRows > 0) {
        return 'Record inserted successfully';
      } else {
        throw new InsertRecordException(pg_last_error($this->dbconnection));
      }
    }
    
    public function update($query) { 
      $result = pg_query($this->dbconnection,$query);
      $affectedRow = pg_affected_rows($result);
      if($affectedRow > 0) {
        return 'Record updated successfully ';
      } else {
        throw new UpdateRecordException(pg_last_error($this->dbconnection));
      }
    }
    
    public function delete($query) {
      $result = pg_query($this->dbconnection,$query);
      $affectedRow = pg_affected_rows($result);      
      if($affectedRow > 0) {
        return 'Record deleted successfuly ';
      } else {
        throw new DeleteRecordException(pg_last_error($this->dbconnection));
      } 
    }
    
  }
?>