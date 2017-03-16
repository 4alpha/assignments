<?php
  
  class DepartmentController {
    public $dao;
    function __construct() {
      $this->dao = new DepartmentDAO();
    }

    public function getAll() {
      $arr = $this->dao->getAll();
      return $arr;
	  }

    public function add() {
      $department = new Department($_POST['dept_no'],$_POST['emp_no'],$_POST['dept_name']);
      $result = $this->dao->add($department);
      return $result;
    }

    public function update() {
      $department = new Department($_POST['dept_no'],$_POST['emp_no'],$_POST['dept_name']);
      $result = $this->dao->update($department);
      return $result;
    }
    
    public function delete() {
      $department = new Department($_POST['dept_no'],$_POST['emp_no'],$_POST['dept_name']);
      $result = $this->dao->delete($department);
      return $result;
    }
  }
?>