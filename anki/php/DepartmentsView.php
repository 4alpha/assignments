<?php
require 'DepartmentsClass.php';
require 'DepartmentDAO.php';

$deptno = $_POST['deptno'];
$deptname = $_POST['deptname'];

$objDept=new Departments($deptno,$deptname);
$objdao=new DepartmentDAO($objDept);

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