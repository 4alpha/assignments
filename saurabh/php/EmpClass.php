<?php
  class Employee { 
    public $dbpostgresql;
    function __construct($dbpostgres) {
      $this->dbpostgresql = $dbpostgres;
    }
    function getRows() {
      $result = $this->dbpostgresql->select();
      return $result;
    }
    function addRow($emp_no, $firstName, $lastName, $hireDate) {
      $result = $this->dbpostgresql->insert($emp_no, $firstName, $lastName, $hireDate);
      return $result;
    }
    function updateRow($emp_no, $firstName, $lastName, $hireDate) {
      $result = $this->dbpostgresql->update($emp_no, $firstName, $lastName, $hireDate);
      return $result;
    }
    function deleteRow($emp_no) {
      $result = $this->dbpostgresql->delete($emp_no);
      return $result;
    }
  }
?>