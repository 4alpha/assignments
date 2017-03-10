<?php
  require 'SalaryClass.php';
  require 'DBPostgres.php';
  require 'SalaryDAO.php';

  $emp_no = $_POST['emp_no'];
  $basic = $_POST['basic'];
  $da = $_POST['da'];
  $ma = $_POST['ma'];
  $ot = $_POST['ot'];
  $hra = $_POST['hra'];
  $ca = $_POST['ca'];
  
  $dbpostgres = new DBPostgres();
  $salary = new Salary($emp_no,$basic,$da,$ma,$ot,$hra,$ca);
  $salarydao = new SalaryDAO($dbpostgres,$salary);

  if(isset($_POST['addSalary'])) {
    $cnt = $salarydao->Insert();
    if($cnt == 1) {
        echo "salary inserted successfully";
    } else {
        echo "salary not inserted successfully";
    }
  }
  if(isset($_POST['getSalaryOf'])) {

  }
  if(isset($_POST['getAllSalary'])) {
    $result = $salarydao->getAll();
    print_r($result);  
  }
  if(isset($_POST['updateSalary'])) {
    $cnt = $salarydao->Update();
    if($cnt == 1) {
      echo "updated successfully";
    } else {
      echo "not updated successfully";
    }
  }
?>