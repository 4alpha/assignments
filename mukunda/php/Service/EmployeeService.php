<?php
  namespace Service;

  use Model\Employee as Employee;
  use Dao\EmployeeDao as EmployeeDao;
  use Dao\DepartmentDao as DepartmentDao;

  class EmployeeService {
   
    public function add($emp_no, $name, $gender, $department) {
      $employee = new Employee(); 
      $employee->id = $emp_no;
      $employee->name = $name;
      $employee->gender = $gender;
      $employee->department = $department;
      $dao = new EmployeeDao(); 
      $result = $dao->add($employee);
      return $result; 
    }

    // public function getRow($emp_no) {
    //   $dao = new EmployeeDao(); 
    //   $result = $dao->get($emp_no);
    //   return $result;
    // }

    public function update($emp_no, $name, $gender, $department) {
      $employee = new Employee(); 
      $employee->id = $emp_no;
      $employee->name = $name;
      $employee->gender = $gender;
      $employee->department = $department;
      $dao = new EmployeeDao(); 
      $result = $dao->update($employee);
      return $result;
    }

    public function delete($emp_no) { 
      $dao = new EmployeeDao(); 
      $result = $dao->delete($emp_no);
      return $result; 
    }
 
    public function getAll() {
      $dao = new EmployeeDao(); 
      $result = $dao->getAll();
      return $result;
    }

    public function checkDepartment() {
      $selectedDepartments = $_POST['department'];
      $count = count($selectedDepartments);
      $departmentDao = new DepartmentDao();   
      $result = $departmentDao->getAll();   
      $flag = true;
      if($count > 1) {
        for($i = 0; $i < $count; $i++) {
          foreach($result as $dept) {
            if($selectedDepartments[$i] == $dept['d_no']) {
              if($dept['multiple_departments'] == "f") {       
                $flag = false;
                break;        
              } else {
                  continue;
              }
            }
          }      
        } 
      } else {
          return true;
      }   
      if($flag == true) {
        return true;
      } else {
        return false;
      } 
    }
  }

   
?>