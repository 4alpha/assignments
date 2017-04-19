<?php
  namespace Services; 
  use DataAccessObject\EmployeeDAO as EmployeeDAO;
  use DataAccessObject\DepartmentDAO as DepartmentDAO;
  use Models\Employee as Employee;

  class EmployeeService {
    private $departmentdao;
    function __construct() {
      $this->employeedao = new EmployeeDAO();
      $this->departmentdao = new DepartmentDAO();
    }
    
    function getAll() {
      return $this->employeedao->getAll();
    }

    function insert($emp_no, $firstName, $lastName, $hireDate, $departments) {
      $employee = new Employee();
      $employee->emp_no = $emp_no;
      $employee->firstName = $firstName;
      $employee->lastName = $lastName;
      $employee->hireDate = $hireDate;
      $employee->departments = $departments;
      if($this->checkDepartments($employee->departments))
        return $this->employeedao->insert($employee);
      else
        return "You can not select multiple departent to employee having department value false";
    }

    function checkDepartments($selectedDepts) {
      $departments = $this->departmentdao->getDepartmentStatusFalse();
      $flag = "yes";
      if(count($selectedDepts) != 1) {
        foreach($departments as $rs  ) {
          foreach($selectedDepts as $selectedOption) {
            if($rs['dept_no'] == $selectedOption) {
              if($rs['multi_dept'] == 't') {
                continue;
              } else {
                $flag = "no";
              }
            }
          }
        }
        if($flag == "yes") {
          return true;
        } else {
          return false;
        }
      } else {
        return true;
      }
    }

    function update($emp_no, $firstName, $lastName, $hireDate, $departments) {
      $employee = new Employee();
      $employee->emp_no = $emp_no;
      $employee->firstName = $firstName;
      $employee->lastName = $lastName;
      $employee->hireDate = $hireDate;
      $employee->departments = $departments;
      if($this->checkDepartments($employee->departments))
        return $this->employeedao->update($employee);
      else
        return "You can not select multiple departent to employee having department value false";
    }

    function delete($emp_no) {
      $employee = new Employee();
      $employee->emp_no = $emp_no;
      return $this->employeedao->delete($employee->emp_no);
    }
  }
  
?>