<?php
  include 'Configuration.php';
   echo "in demoAjax";
  $db_connection = pg_connect( "host = ".$GLOBALS['host']."  port = ".$GLOBALS['port']." dbname = ".$GLOBALS['dbname']." user = ".$GLOBALS['user']." password = ".$GLOBALS['password']." " );
  if($db_connection){
    echo "connection successfull";
  } else {
    echo "connection fail";
  }
  $employeeNumber = $_POST['emp_no'];
  $name = $_POST['name'];
  $gender = $_POST['gender'];

  $query = pg_query("insert into emp(e_no, name, gender) values ($employeeNumber, '$name', '$gende')");
  echo "Form Submitted Succesfully";

?>