<?php
  require 'EmpClass.php';
  require 'DBPostgres.php';

  $dbpostgresql = new DBPostgres();
  $emp = new Employee($dbpostgresql);
  
  $emp_no = $_POST['emp_no'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $hireDate = $_POST['hireDate'];
  
  if(isset($_POST['getRow']))
  {
    $result = $emp->getRows();
    print_r($result);
  }
  if(isset($_POST['addRow']))
  {
    $cnt = $emp->addRow($emp_no, $firstName, $lastName, $hireDate);
    if($cnt == 1) {
        echo "inserted successfully";
    } else {
        echo "not inserted successfully";
    }
  }
  if(isset($_POST['updateRow']))
  {
    $cnt = $emp->updateRow($emp_no, $firstName, $lastName, $hireDate);
    if($cnt == 1) {
      echo "updated successfully";
    } else {
      echo "not updated successfully";
    }
  }
  if(isset($_POST['deleteRow']))
  {
    $cnt = $emp->deleteRow($emp_no);
    if($cnt == 1) {
      echo "deleted successfully";
    } else {
      echo "not deleted successfully";
    }
  }
?>