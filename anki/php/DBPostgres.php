<?php
require 'interfaceDB.php';

class DBPostgres implements DB {

  public function __construct() {
    $db_connect=pg_connect("host=localhost dbname=testdb user=postgres password=psql")
     or die ("Could not connect to server\n");  
     
  }
  
  function insert($q1) {
    try {
      $query1=pg_query($q1);
      if ($query1 == 0) {
        throw new Exception('ID Already exist , Please enter another ID or Fill all values !!');
      } else {
        $ans1=pg_fetch_object($query1);
        return $ans1."<br>RECORD INSERTED SUCCESSFULLY...";
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
  function update($q2) {
    try {
      $query2 = pg_query($q2);
      $queryVarU = pg_affected_rows($query2);
      if ($queryVarU == 0) {
         throw new Exception('Value does not exist !!');
      }else {
      $ans2=pg_fetch_row($query2);
      return $ans2."<br>RECORD UPDATED SUCCESSFULLY...";
      }
    }
    catch (Exception $e) {
    echo $e->getMessage();
    }
  }

  function delete($q3) {
    try {
      $query3 = pg_query($q3);
      $queryVarD = pg_affected_rows($query3);
      if($queryVarD == 0) {
        throw new Exception('ID does not exist..Please try again');
      } else {
          $ans3=pg_fetch_row($query3);
          return $ans3."<br>RECORD DELETED SUCCESSFULLY...";
      }
    } catch(Exception $e) {
      echo $e->getMessage();
    }
  }  

  function select($q4) {
    try {
      $query4=pg_query($q4);
      if ($query4 == false) {
        throw new Exception('Record Not Found..:(');
      } else {
        while($ans4=pg_fetch_object($query4)){
          print_r($ans4);
        }
        return $ans4;
      }
    } catch(Exception $e) {
      echo $e->getMessage();
    }  
  }
}

?>