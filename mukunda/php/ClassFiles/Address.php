<?php
  namespace ClassFiles; 
  class Address {
    public $employeeId;
    public $city;
    function __construct($employeeId,$city) {      
      $this->employeeId = $employeeId;
      $this->city = $city;     
    }
  }
?>