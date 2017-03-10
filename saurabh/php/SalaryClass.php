<?php
  class Salary {
    var $emp_no;
    var $basic;
    var $da;
    var $ma;
    var $ot;
    var $hra;
    var $ca;
    function __construct($emp_no,$basic,$da,$ma,$ot,$hra,$ca) {
      $this->emp_no = $emp_no;
      $this->basic = $basic;
      $this->da = $da;
      $this->ma = $ma;
      $this->ot = $ot;
      $this->hra = $hra;
      $this->ca = $ca;
    }
  }  
?>