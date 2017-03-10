<?php
include 'interfaceDB.php'; 
class Postgres implements DB {
    function __construct() {
        $db_conn = pg_connect("host=localhost dbname=mydatabase user=postgres password=psql") or die(pg_last_error()); 
    }
    function get($query) {     
        $result = pg_query($query);
        return pg_fetch_all($result);
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
        $result = pg_query($query);
        return pg_affected_rows($result);
    }
    function delete($query) {     
        $result = pg_query($query);
        return pg_affected_rows($result);
    }
}
?>