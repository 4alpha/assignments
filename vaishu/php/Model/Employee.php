<?php
  namespace Model;

  class Employee {
    var $emp_no;
    var $emp_name;
    
    public function __construct($emp_no, $emp_name) {
      $this->emp_no = $emp_no;
      $this->emp_name = $emp_name;
    }
  }
?>