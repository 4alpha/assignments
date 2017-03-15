<?php
  class Employee { 
    var $emp_no;
    var $firstName;
    var $lastName;
    var $hireDate;
    function __construct($emp_no,$firstName,$lastName,$hireDate) {
      $this->emp_no = $emp_no;
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->hireDate = $hireDate;
    }
  }
?>