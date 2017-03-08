<?php
require 'interfaceEmployee.php';

class DBPostgres {

  public function __construct() {
    $db_connect=pg_connect("host=localhost dbname=testdb user=postgres password=psql")
     or die ("Could not connect to server\n");  
     
  }
  
  function insert($q1) {
    $query1=pg_query($q1);
    $ans1=pg_fetch_object($query1);
    return $ans1;
  }

  function update($q2) {
    $query2=pg_query($q2);
    $ans2=pg_fetch_all($query2);
    return $ans2;
  } 

  function delete($q3) {
    $query3=pg_query($q3);
    $ans3=pg_fetch_all($query3);
    return $ans3;
  }  

  function select($q4) {
    $query4=pg_query($q4);
    while($ans4=pg_fetch_object($query4)){
      print_r($ans4);
    }
    // return $ans4;
  } 
}

?>