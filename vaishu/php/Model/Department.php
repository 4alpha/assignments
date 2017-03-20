<?php
  namespace Model;

  class Department {
    public  $deptno;
    public $id;
    public  $deptname;
    
    public function __construct($deptno, $id, $deptname) {
      $this->deptno = $deptno;
      $this->id = $id;
      $this->deptname = $deptname;
    }
  }
?>