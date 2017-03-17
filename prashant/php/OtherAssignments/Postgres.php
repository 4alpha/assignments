<?php
//namespace DB_Model;
ini_set('display_errors',1);
//use DB_Model\DB as DB;
use DB_Exceptions\GetRecordException as GetRecordException;
use DB_Exceptions\UpdateException as UpdateException;
use DB_Exceptions\DeleteException as DeleteException;
class Postgres implements DB {
    function __construct() {
        try {
            $db_conn = pg_connect("host=".$GLOBALS['host']." dbname=".$GLOBALS['dbName']." user=".$GLOBALS['user']." password=".$GLOBALS['password']); 
            if(!$db_conn) {
                throw new ConnectionException();
            }
        }
        catch(ConnectionException $e) {
            return $e->getMessage();
        }
    }
    function get($query) {
        try {
            $result = pg_query($query);
            $row = pg_fetch_array($result);
            if($row == 0) {
                throw new GetRecordException();
            }            
            return $row;
        }
        catch(GetRecordException $e) {
            return $e->errorMessage();
        }   
    }

    function getAll($query) {   
        $result = pg_query($query);
        $row = pg_fetch_all($result); 
        return $row;
    }

    function insert($query) {     
        $result = pg_query($query);
        return pg_affected_rows($result);
    }

    function update($query) {
        try {
            $result = pg_query($query);
            $affectedRow = pg_affected_rows($result); 
            if( $affectedRow == 0) {
                throw new UpdateException();
            }
             return $affectedRow;
        }
        catch(UpdateException $e) {

            return $e->errorMessage();
        }  
            
    }

    function delete($query) { 
        try {
            $result = pg_affected_rows( pg_query($query) );
            if( $result == 0) {
                throw new DeleteException();
             }
             return $result;        
        }
        catch(DeleteException $e) {
            return $e->errorMessage();
        }
    }
}
?>