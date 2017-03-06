<?php
include 'interfaceDB.php'; 
class Postgres implements DB {
    function __construct() {
        $db_conn=pg_connect("host=localhost dbname=mydatabase user=postgres password=psql") or die(pg_last_error()); 
    }
    function executeQuery($query) {     
        $result = pg_query($query);
        return $result;
    }
}pg_close($db_conn);
?>