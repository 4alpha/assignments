<?php
  require 'EmployeeDAO.php';
  require 'EmpClass.php';
  class EmpController {
    public $empdao;
    function __construct() {
      $this->empdao = new EmployeeDAO();
    }
    function getRow() {
      echo 'hictrl';
      echo $_POST['emp_no'];
      $result = $this->empdao->getAll();
      //return $result;
    }
    function addRow() {
      $emp = new Employee($_POST['emp_no'],$_POST['firstName'],$_POST['lastName'],$_POST['hireDate']);
      $result = $this->empdao->Insert($emp);
      return $result;
    }
    function updateRow() {
      $emp = new Employee($_POST['emp_no'],$_POST['firstName'],$_POST['lastName'],$_POST['hireDate']);
      $result = $this->empdao->Update($emp);
      return $result;
    }
    function deleteRow() {
      $result = $this->empdao->Delete($_POST['emp_no']);
      return $result;
    }
  }
?>