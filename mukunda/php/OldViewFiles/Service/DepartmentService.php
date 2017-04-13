<?php
  namespace Service;
  use Dao\DepartmentDao as DepartmentDao;

  class DepartmentService {
    public function getAllDepartmentNames() {
      $departmentDao = new DepartmentDao();
      $GLOBALS['department'] = $departmentDao->getAll();
    }

    // public function getSelectedDepartments() {
    //   $departmentDao = new DepartmentDao();
    //   $selectedDepartment = $_POST['departments'];
    //   print_r($selectedDepartment);
    // }
  }


?>