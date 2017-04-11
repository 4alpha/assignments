<?php
  namespace Controller;
  
  use Model\Department as Department;
  use Dao\DepartmentDao as DepartmentDao;
  
  class DepartmentController {
    public function add($data) {
      $department = new Department(); 
      $department->departmentId = $data['d_no'];
      $department->departmentName = $data['d_name'];
      $department->multipleDepartments = $data['multiple_departments'];
      $dao = new DepartmentDao(); 
      $result = $dao->add($department);
      return $result;
    }
     
    public function getRow($data) {
      $dao = new DepartmentDao(); 
      $result = $dao->get($data['d_no']);
      return $result;
    }

    public function update($data) { 
      $department = new Department(); 
      $department->departmentId = $data['d_no'];
      $department->departmentName = $data['d_name'];
      $department->multipleDepartments = $data['multiple_departments'];
      $dao = new DepartmentDao(); 
      $result = $dao->update($department);
      return $result;
    }

    public function delete($data) { 
      $dao = new DepartmentDao(); 
      $result = $dao->delete($data['d_no']);
      return $result; 
    }

    public function getAll() {
      $dao = new DepartmentDao(); 
      $result = $dao->getAll();
      return $result;
    }
  }
?>