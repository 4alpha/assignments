<?php
require 'EmployeeClass.php';
require 'DBPostgres.php';

$empno=$_POST['empno'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$bdate=$_POST['bdate'];
$gender=$_POST['gender'];
$hdate=$_POST['hiredate'];

$objEmpInter=new DBPostgres();
$objemp=new Employee($objEmpInter);

if(isset($_POST['add'])) {
  $ans1 = $objemp->addEmployee($empno,$fname,$lname,$bdate,$gender,$hdate);
  // print_r($ans1);
  echo "RECORD INSERTED SUCCESSFULLY..";
}

if(isset($_POST['update'])) {
  $ans2 = $objemp->updateemp($empno,$fname,$lname,$bdate,$gender,$hdate);
  // print_r($ans2);
  echo "RECORD UPDATED SUCCESSFULLY..";
}

if(isset($_POST['delete'])) {
  $ans3 = $objemp->deleteemp($empno);
  // print_r($ans3);
  echo "RECORD DELETED SUCCESSFULLY..";
}

if(isset($_POST['getrow'])) {
  $ans4 = $objemp->getrowemp();
  print_r($ans4);
}

?>