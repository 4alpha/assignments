<?php
  require 'DataBase.php';
  class DBPostgres implements DataBase {
    function __construct() {
      $dbcon = pg_connect("host = localhost dbname = employees user = postgres password = psql") 
      or die('could not connect');
    }
    public function select() {
      $get = pg_query('select * from employees;');
      $result = pg_fetch_all($get);
      print_r($result);
      return $result;
    }
    public function insert($emp_no, $firstName, $lastName, $hireDate) {
      $result = pg_query("insert into employees values('$emp_no','$firstName','$lastName','$hireDate');");
      $cnt = pg_affected_rows($result);
      return $cnt;
    }
    public function update($emp_no, $firstName, $lastName, $hireDate) {
      $result = pg_query("update employees set first_name='$firstName', last_name='$lastName', hire_date='$hireDate' where emp_no = '$emp_no';");
      $cnt = pg_affected_rows($result);
      return $cnt;
    }
    public function delete($emp_no) {
      $result = pg_query("delete from employees where emp_no = '$emp_no';");
      $cnt = pg_affected_rows($result);      
      return $cnt;
    }
  }
?>