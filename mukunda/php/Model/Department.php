<?php
  namespace Model; 
  
  class Department {
    public $departmentId;
    public $departmentName;
    public $multipleDepartments;
    function __construct($departmentId, $departmentName, $multipleDepartments) {      
      $this->departmentId = $departmentId;
      $this->departmentName = $departmentName;  
      $this->multipleDepartments = $multipleDepartments;
    }
  }
?>