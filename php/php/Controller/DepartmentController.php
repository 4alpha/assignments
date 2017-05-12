<?php
  namespace Controller;
  use DAO\DepartmentDAO as DepartmentDAO;
  use Model\Department as Department;
  
  class DepartmentController {
    public $dao;
     private $_keys = ['no' => 'dept_no', 'name' => 'dept_name','can_have_multiple_department' => 'can_have_multiple_department' ];
    function __construct() {
      $this->dao = new DepartmentDAO();
    }

    public function getAll() {
      $arr = $this->dao->getAll();
      return $arr;
	  }

    public function add($data) {
      $department = new Department();
      $department->dept_no = $data['dept_no'];
      $department->dept_name = $data['dept_name'];
      $department->can_have_multiple_department = $data['can_have_multiple_department'];
      $result = $this->dao->add($department);
      return $result;
    }

    public function update($data) {
      $department = new Department();
      $department->dept_no = $data['dept_no'];
      $department->dept_name = $data['dept_name'];
      $department->can_have_multiple_department = $data['can_have_multiple_department'];
      return $this->dao->update($department);
    }
    
    public function delete($data) {
      $result = $this->dao->delete($data[$this->_keys['no']]);
      return $result;
    }
  }
?>