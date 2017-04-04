<?php  
namespace DataBase;

use DataBaseException\FetchRecordException as FetchRecordException;
use DataBaseException\InsertRecordException as InsertRecordException;
use DataBaseException\UpdateRecordException as UpdateRecordException;
use DataBaseException\DeleteRecordException as DeleteRecordException;

class Postgres extends DBconnection  {
    private $dbConnection;
     function __construct() {
        $this->dbConnection=pg_connect( "host=".$GLOBALS['host']." dbname=".$GLOBALS['dbname']." user=".$GLOBALS['user']." password=".$GLOBALS['password']." ")
        or die( "Could not connect" );
     }

    public function getRow( $query ) {
        $result = pg_query( $this->dbConnection, $query );
        $affected_rows = pg_fetch_all( $result );
        if(!$result){
            throw new FetchRecordException();
        } else {
            return $affected_rows;
        }
    }

    public function addData( $query ) {
        $result = pg_query( $this->dbConnection, $query );
        if( !$result ){
            throw new InsertRecordException();
        } else {
            return "record inserted";
        }
    }

    public function updateData( $query ) { 
        $result = pg_query( $this->dbConnection, $query );
        $affected_rows = pg_affected_rows( $result );
        if( $affected_rows == 0 ){
            throw new UpdateRecordException();
        } else {
            return "updated successfully";
        }
    }

    public function delete( $query ) {
        $result = pg_query( $this->dbConnection, $query );
        $affected_rows = pg_affected_rows($result);
        if( $affected_rows == 0 ){
            throw new  DeleteRecordException();
        } else {
            return "record deleted successfully"."<br>";
        }
    }
}
?>