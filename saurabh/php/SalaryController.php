<?php

  require_once 'SalaryDAO.php';
  require_once 'SalaryClass.php';
  class SalaryController {
    public $saldao;
    // public $sal;
    function __construct() {
      // $this->sal = new Salary($_POST['emp_no'],$_POST['basic'],$_POST['da'],$_POST['ma'],$_POST['ot'],$_POST['hra'],$_POST['ca']);
      $this->saldao = new SalaryDAO();
    }
    function getRow() {
      $result = $this->saldao->getAll();
      return $result;
    }
    function addRow() {
      $sal = new Salary($_POST['emp_no'],$_POST['basic'],$_POST['da'],$_POST['ma'],$_POST['ot'],$_POST['hra'],$_POST['ca']);
      $result = $this->saldao->Insert($sal);
      return $result;
    }
    function updateRow() {
      $sal = new Salary($_POST['emp_no'],$_POST['basic'],$_POST['da'],$_POST['ma'],$_POST['ot'],$_POST['hra'],$_POST['ca']);
      $result = $this->saldao->Update($sal);
      return $result;
    }
    function deleteRow() {
      $result = $this->saldao->Delete($_POST['emp_no']);
      return $result;
    }
  }
?>