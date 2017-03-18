<?php
namespace Models;
 class Department {
   var $deptno,$deptname;

   public function __construct($deptno,$deptname) {
     $this->deptno = $deptno;
     $this->deptname = $deptname;
   }
 }
?>
