<?php
  namespace Model;
  
  class Employee {
    public $id;     
    public $name;
    public $gender;
    public $department;
    function __construct($id, $name, $gender, $department) {
      $this->id = $id;
      $this->name = $name;
      $this->gender = $gender; 
      $this->department = $department;   
    }
  }    
?>