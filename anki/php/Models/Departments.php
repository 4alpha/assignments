<?php
namespace Models;
 class Departments {
   var $deptno,$deptname;

   public function __construct($deptno,$deptname) {
     $this->deptno = $deptno;
     $this->deptname = $deptname;
   }
 }
?>
