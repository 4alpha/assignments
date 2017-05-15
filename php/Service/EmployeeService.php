<?php
  namespace Service;
  use DAO\EmployeeDAO as EmployeeDAO;
  use DAO\DepartmentDAO as DepartmentDAO;
  use Model\Employee as Employee;
  
  class EmployeeService {
    private $departmentdao;
    private $employeedao;
  
    function __construct() {
      $this->departmentdao = new DepartmentDAO();
      $this->employeedao = new EmployeeDAO();
    }
  
    function departmentService() {
      $flag = "true";
      $count = count($_POST['departments']);
      $sql = $this->departmentdao->getdept();;
      if($count != 1) { 
        while ($rs = pg_fetch_array($sql)) { 
          foreach($_POST['departments'] as $department) {
            if ($rs['dept_no'] == $department) { 
              if ($rs['can_have_multiple_department'] == 't') {
                continue;
              } else {
              $flag = "false";
              }
            }
          }
        }
      } else {
        return "true";
      }
      if ($flag == "true") {
        return "true";
      } else {
        return "false";
      }
    }
  
    public function getAll() {
      $arr = $this->employeedao->getAll();
      return $arr;
    }

    function add($emp_no,$emp_name,$departments) { 
      $employee = new Employee();
      $employee->emp_no = $emp_no;
      $employee->emp_name = $emp_name;
      $employee->departments = $departments;
      $result = $this->employeedao->add($employee);
      return $result ;
    }

    function update($emp_no,$emp_name,$departments) {
      $employee = new Employee();
      $employee->emp_no = $emp_no;
      $employee->emp_name = $emp_name;
      $employee->departments = $departments;
      $result = $this->employeedao->update($employee);
      return $result;
    }

    function delete($emp_no) {
      $employee = new Employee();
      $employee->emp_no = $emp_no;
      $result = $this->employeedao->delete($emp_no);
      return $result;
    }

}
?>