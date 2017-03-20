<?php
namespace Models;
class Department {
  var $deptno,$deptname;

  function __construct($deptno,$deptname) {
    $this->deptno = $deptno;
    $this->deptname = $deptname;
  }
}
?>
