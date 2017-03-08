<?php
require 'EmployeeClass.php';
require 'EmployeeDAO.php';

$empno=$_POST['empno'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$bdate=$_POST['bdate'];
$gender=$_POST['gender'];
$hdate=$_POST['hiredate'];

$objemp=new Employee($empno,$fname,$lname,$bdate,$gender,$hdate);
$objdao=new EmployeeDAO($objEmpInter);

if(isset($_POST['add'])) {
  $ans1 = $objdao->addDAO();
 // print_r($ans1);
  echo "RECORD INSERTED SUCCESSFULLY..";
}

if(isset($_POST['update'])) {
  $ans2 = $objdao->updateDAO();
  // print_r($ans2);
  echo "RECORD UPDATED SUCCESSFULLY..";
}

if(isset($_POST['delete'])) {
  $ans3 = $objdao->deleteDAO();
  // print_r($ans3);
  echo "RECORD DELETED SUCCESSFULLY..";
}

if(isset($_POST['getrow'])) {
  $ans4 = $objdao->getAll();
  print_r($ans4);
}

?>