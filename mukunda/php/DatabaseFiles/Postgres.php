<?php
  namespace DatabaseFiles;

  use ExceptionNamespace\DeleteException as DeleteException;
  use ExceptionNamespace\UpdateException as UpdateException;
  use ExceptionNamespace\ConnectionException as ConnectionException;
  use ExceptionNamespace\FetchRecordException as FetchRecordException;

  class Postgres implements Database {
    private $db_connection;
    function __construct() {
      try { 
        $this->db_connection = pg_connect( "host = ".$GLOBALS['host']."  port = ".$GLOBALS['port']." dbname = ".$GLOBALS['dbname']." user = ".$GLOBALS['user']." password = ".$GLOBALS['password']." " );
        if( !$this->db_connection ) {
          throw new ConnectionException();
        } 
      }
      catch( ConnectionException $e ) {
        echo $e->getConnectionErrorMessage()."<br>";
      }  
    }

    public function insert($query) {
      $result = pg_query($this->db_connection, $query);  
      return $result."</div>"; 
    }
      
    public function update($query) {
      $result = pg_query($this->db_connection, $query);    
      $affected_rows = pg_affected_rows($result);
      if($affected_rows == 0) {
        throw new UpdateException();
      } else { 
          return "<br><div style=margin-left:680px>" . "data is updated" . "</div>";
        }                
    }

    public function delete($query) {   
      $result = pg_query( $this->db_connection, $query );  
      $affected_rows = pg_affected_rows($result);
      if($affected_rows == 0) {
        throw new DeleteException();
      } else {
          return "<br><div style=margin-left:680px>" . "data is deleted" . "</div>";
        }   
    }
      
    public function get($query) {
      $result = pg_query($this->db_connection, $query);   
      $return_rows = pg_num_rows($result); 
      if($return_rows == 0) { 
        throw new FetchRecordException();
      } else {
          return $result;
        }                 
    }

    public function getAll($query) {
      $result = pg_query($this->db_connection, $query);
      return $result;
    }
  }
?>


