<?php
require 'interfaceEmployee.php';
class DBPostgres implements Employees {

  function __construct() {
    $db_connect=pg_connect("host=localhost dbname=testdb user=postgres password=psql")
     or die ("Could not connect to server\n");
  }

  function insertEmp($empno,$fname,$lname,$bdate,$gender,$hdate) {
    $query1=pg_query("insert into employees values('$empno','$fname','$lname','$bdate','$gender','$hdate');");
    $ans1=pg_fetch_all($query1);
    return $ans1;
  }

  function updateEmp($empno,$fname,$lname,$bdate,$gender,$hdate) {
    $query2=pg_query("update employees set emp_no='$empno', first_name='$fname', last_name='$lname',birth_date='$bdate',gender='$gender',hire_date='$hdate' where emp_no='$empno';");
    $ans2=pg_fetch_all($query2);
    return $ans2;
  } 

  function deleteEmp($empno) {
    $query3=pg_query("delete from employees where emp_no='$empno'");
    $ans3=pg_fetch_all($query3);
    return $ans3;
  }  

  function selectEmp() {
    $query4=pg_query("select * from employees;");
    $ans4=pg_fetch_all($query4);
    return $ans4;
  } 
}

?>