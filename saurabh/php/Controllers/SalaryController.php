<?php
  namespace Controllers;
  use Models\Salary as Salary;
  use DataAccessObject\SalaryDAO as SalaryDAO;  
  
  class SalaryController {
    private $salarydao;
    private $keys = ['no' => 'emp_no', 'basic' => 'basic', 'da' => 'da', 'ma' => 'ma', 'ot' => 'ot', 'hra' => 'hra', 'ca' => 'ca'];
    function __construct() {
      $this->salarydao = new SalaryDAO();
    }
    
    function getRow() {
      return $this->salarydao->getAll();
    }
    
    function addRow($data) {
      $salary = new Salary($data[$this->keys['no']], $data[$this->keys['basic']], $data[$this->keys['da']], $data[$this->keys['ma']], $data[$this->keys['ot']], $data[$this->keys['hra']], $data[$this->keys['ca']]);
      return $this->salarydao->insert($salary);
    }
    
    function updateRow($data) {
      $salary = new Salary($data[$this->keys['no']], $data[$this->keys['basic']], $data[$this->keys['da']], $data[$this->keys['ma']], $data[$this->keys['ot']], $data[$this->keys['hra']], $data[$this->keys['ca']]);
      return $this->salarydao->update($salary);
    }
    
    function deleteRow($data) {
      return $this->salarydao->delete($data[$this->keys['no']]);
    }
    
  }
?>