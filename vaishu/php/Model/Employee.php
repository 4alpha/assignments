<?php
  namespace Model;

  class Employee {
    var  $id;
    var  $name;
    
    public function __construct($id, $name) {
      $this->id = $id;
      $this->name = $name;
    }
  }
?>