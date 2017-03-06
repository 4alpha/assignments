<?php
include 'interfaceDB.php'; 
class Postgres implements DB {
    function __construct() {
         $db_conn=pg_connect("host=localhost dbname=mydatabase user=postgres password=psql") or die(pg_last_error()); 
    }
    function insert($query) {
        $result = pg_query($query);
        return $result;
    }
    function update($query) {
        $result = pg_query($query);
        return $result;
    }
    function delete($query) {
        $result = pg_query($query);
        return $result;
    }
    function getAll($query) {
        $result = pg_query($query);
        return $result;
    }
    function get($query) {        
        $result = pg_query($query);
        return $result;
    }
}pg_close($db_conn);
?>