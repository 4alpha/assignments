<?php
  namespace Entity;
  
  class Employee {
    public $id;     
    public $name;
    public $gender;
    function __construct($id, $name, $gender) {
      $this->id = $id;
      $this->name = $name;
      $this->gender = $gender;    
    }
  }    
?>