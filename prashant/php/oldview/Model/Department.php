<?php
  namespace Model;
  class Department {
    private $data = array();
    
    public function __set($key, $value) {
      $this->data[$key] = $value;
    }
    
    public function __get($key) {
      return $this->data[$key];
    }
  } 
?>