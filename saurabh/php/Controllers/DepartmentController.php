<?php
  namespace Controllers;
  use Models\Department as Department;
  use DataAccessObject\DepartmentDAO as DepartmentDAO; 

  class DepartmentController {
    private $dao;
    private $keys = ['no' => 'dept_no', 'dept_name' => 'dept_name', 'multi_dept' => 'multi_dept'];
    function __construct() {
      $this->dao = new DepartmentDAO();
    }

    function getRow() {
      return $this->dao->getAll();
    }
    function addRow($data) { 
      $department = new Department();
      $department->dept_no = $data['dept_no'];
      $department->dept_name = $data['dept_name'];
      $department->multi_dept = $data['multi_dept'];
      return $this->dao->insert($department);
    }
    function updateRow($data) {
      $department = new Department();
      $department->dept_no = $data['dept_no'];
      $department->dept_name = $data['dept_name'];
      $department->multi_dept = $data['multi_dept'];
      return $this->dao->update($department);
    } 
    function deleteRow($data) {
      $department = new Department();
      $department->dept_no = $data['dept_no'];
      return $this->dao->delete($department->dept_no);
    } 
      
  }
?>