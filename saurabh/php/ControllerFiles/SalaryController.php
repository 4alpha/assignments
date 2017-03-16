<?php
  use Models\Salary as Salary;
  use DataAccessObject\SalaryDAO as SalaryDAO;  
  
  class SalaryController {
    public $salarydao;
    
    function __construct() {
      $this->salarydao = new SalaryDAO();
    }
    
    function getRow() {
      $result = $this->salarydao->getAll();
      return $result;
    }
    
    function addRow() {
      $salary = new Salary($_POST['emp_no'],$_POST['basic'],$_POST['da'],$_POST['ma'],$_POST['ot'],$_POST['hra'],$_POST['ca']);
      $result = $this->salarydao->Insert($salary);
      return $result;
    }
    
    function updateRow() {
      $salary = new Salary($_POST['emp_no'],$_POST['basic'],$_POST['da'],$_POST['ma'],$_POST['ot'],$_POST['hra'],$_POST['ca']);
      $result = $this->salarydao->Update($salary);
      return $result;
    }
    
    function deleteRow() {
      $result = $this->salarydao->Delete($_POST['emp_no']);
      return $result;
    }
    
  }
?>