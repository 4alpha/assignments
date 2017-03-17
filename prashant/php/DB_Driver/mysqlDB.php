<?php
include 'interfaceDB.php'; 
class MysqlDB implements DB {
    function __construct() {
        $db_conn=mysqli_connect("localhost", "employee", "root", "mysql", "employee"); 
    }
    function executeQuery($query) {
        $result = $db_conn->query($query);
        return $result;
    }
    // function update($query) {
    //     $result = $db_conn->query($query);
    //     return $result;
    // }
    // function delete($query) {
    //     $result = $db_conn->query($query);
    //     return $result;
    // }
    // function getAll($query) {
    //     echo "hello";
    //     $result = $db_conn->query($query);
    //     return $result;
    // }
    // function get($query) {        
    //     $result = $db_conn->query($query);
    //     return $result;
    // }
}$db_conn->close();
?>