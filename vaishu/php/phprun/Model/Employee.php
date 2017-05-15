<?php
  namespace Model;

  class Employee {
    private $data = array();
    public function __get($key) {
      return $this->data[$key];
    }

    public function __set($key, $value) {
      $this->data[$key] = $value;
    }
  }
?>