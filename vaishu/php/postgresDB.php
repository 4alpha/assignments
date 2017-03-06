<?php
include 'interfaceDB.php';
  
class postgresDB implements DB{
  function __construct() {
  $dbconn = pg_connect("host=localhost dbname=testdb1 user=postgres  password=psql") or 
	die('could not connect'.pg_last_error());
  echo "Opened database through postgresdb\n<br>";
  }
  public function getALL(){
    echo"inside get all";
      $query = "select emp_no,emp_name from employee";
      $result = pg_query($query);
      if (!$result) {
        echo "An error occurred.\n";
        exit;
      }
      $arr = pg_fetch_all($result);
      print_r($arr);
      
    }

    public function add($id,$name){
      $result = pg_query("INSERT INTO employee VALUES ('$id','$name');"); 
      if (!$result) {
            $errormessage = pg_last_error();
            echo "Error with query: " . $errormessage;
            exit();
      }
    }

    public function update($id,$name){
      $query = "update employee set emp_name='$name' where emp_no='$id';";
      $result = pg_query($query);
      if (!$result) {
        printf ("ERROR");
        $errormessage = pg_errormessage($dbconn);
        echo $errormessage;
        exit();
      }
      
    }
    
    public function delete($id){
      $query = "DELETE FROM employee where emp_no='$id'";
      $result = pg_query($query);
      if (!$result) {
        printf ("ERROR");
        $errormessage = pg_errormessage($dbconn);
        echo $errormessage;
        exit();
      }
    }

  }
  ?>