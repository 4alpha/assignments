<?php
  namespace DB_Driver;
  use DB_Exceptions\GetRecordException as GetRecordException;
  use DB_Exceptions\UpdateException as UpdateException;
  use DB_Exceptions\DeleteException as DeleteException;
  use DB_Exceptions\InsertException as InsertException;
  use DB_Exceptions\ConnectionException as ConnectionException;

  class Postgres extends DB {
    private $db_conn;

    public function __construct() {
      try {
        $this->db_conn = pg_connect( "host=" . $GLOBALS['host'] . " dbname=" . $GLOBALS['dbName'] . " user=" . $GLOBALS['user'] . " password=" . $GLOBALS['password']); 
        if(pg_last_error($this->db_conn)) {
          throw new ConnectionException();
        }
      } catch(ConnectionException $e) {
        echo $e->getMessage();
      }
    }

    public function get($query) {
      $result = pg_query($this->db_conn, $query);
      $row = pg_fetch_array($result);
      if(!$row)  {
        throw new GetRecordException();
      }            
      return $row;   
    }

    public function getAll($query) {   
      $result = pg_query($this->db_conn, $query);
      $row = pg_fetch_all($result); 
      return $row;
    }

    public function insert($query) {     
      $result = pg_query($this->db_conn, $query); 
      if(pg_last_error($this->db_conn)) {
        throw new InsertException();
      }
      return pg_affected_rows($result);
    }

    public function update($query) {
      $result = pg_query($this->db_conn, $query); 
      if(pg_last_error($this->db_conn)) {
        throw new UpdateException();
      }
      return pg_affected_rows($result);
    }

    public function delete($query) { 
      $result = pg_affected_rows(pg_query($this->db_conn, $query));
      if($result == 0) {
        throw new DeleteException();
      }
      return $result;    
    }
  }
?>