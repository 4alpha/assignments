<?php
  namespace Model; 
  
  class Department {
    private $data = array();
    public function __set($key, $value) {
      $this->data[$key] = $value;
    }

    public function __get($name) {
      return $this->data[$name];
    } 
  }    
  //   public $departmentId;
  //   public $departmentName;
  //   public $multipleDepartments;
  //   function __construct($departmentId, $departmentName, $multipleDepartments) {      
  //     $this->departmentId = $departmentId;
  //     $this->departmentName = $departmentName;  
  //     $this->multipleDepartments = $multipleDepartments;
  //   }
  // }
?>