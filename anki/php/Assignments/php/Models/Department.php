<?php
namespace Models;
class Department {
  private $data = array();
  public function __set($key, $value) {
    $this->data[$key] = $value;
  }

  public function __get($name) {
    return $this->data[$name];
  } 
}
?>
