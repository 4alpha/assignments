<?php
  namespace Models;

  class Department {
    private $data = array();
    private function __get($key) {
      return $this->data[$key];
    }

    private function __set($key, $value) {
      $this->data[$key] = $value;
    }
    
  }
?>