<?php
  namespace Database;

  use Exceptions\DeleteException as DeleteException;
  use Exceptions\UpdateException as UpdateException;
  use Exceptions\ConnectionException as ConnectionException;
  use Exceptions\FetchRecordException as FetchRecordException;

  class Postgres extends Database {
    private $db_connection;
    function __construct() {
      try { 
        $this->db_connection = pg_connect( "host = ".$GLOBALS['host']."  port = ".$GLOBALS['port']." dbname = ".$GLOBALS['dbname']." user = ".$GLOBALS['user']." password = ".$GLOBALS['password']." " );
        if(!$this->db_connection) {
          throw new ConnectionException();
        }
      }
      catch( ConnectionException $e ) {
        echo $e->getErrorMessage()."<br>";
      }  
    }

    public function add($query) {
      $result = pg_query($this->db_connection, $query);  
      return pg_last_oid($result);
    }

    public function get($query) {
      $result = pg_query($this->db_connection, $query);   
      $resultObject = pg_fetch_object($result);
      $return_rows = pg_num_rows($result); 
      if($return_rows == 0) { 
        throw new FetchRecordException();
      } else {
          return $resultObject->emp_no;
      }                 
    }

    public function update($query) {
      $result = pg_query($this->db_connection, $query);   
      $affected_rows = pg_affected_rows($result);
      if($affected_rows == 0) {
        throw new UpdateException();
      } else { 
          return "data is updated" ;
      }                
    }

    public function delete($query) {   
      $result = pg_query( $this->db_connection, $query);  
      $affected_rows = pg_affected_rows($result);
      if($affected_rows == 0) {
        throw new DeleteException();
      } else {
          return "data is deleted";
      }   
    }
      
    public function getAll($query) {
      $result = [];
      $data = pg_query($this->db_connection, $query);
      $result = pg_fetch_all($data);
      // print_r($result);
      return $result;
    }
  }
?>


