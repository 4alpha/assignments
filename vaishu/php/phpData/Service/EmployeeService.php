<?php
  namespace Service;
  use DAO\EmployeeDAO as EmployeeDAO;
  use DAO\DepartmentDAO as DepartmentDAO;
  use Model\Employee as Employee;
  
  class EmployeeService {
    private $departmentdao;
    private $employeedao;
  
  public function departmentService($departmentName) {  
      $departmentdao = new DepartmentDAO($employee);
      $departments = $departmentdao->getdepartmentstatus($departmentName);
      foreach ($departments as $department)
        { 
          $departData = reset($department);
          foreach ($departData as $departmentStatus) {
            $status[] = $departmentStatus;
          }
        } 
        $count = count($status);
        if($count>1) {
          foreach($status as $check) {
            if($check == 'f' ) {
              return 'false';
            }
          }
        } else {
          return 'true';
        }
      }
  
    public function getAll() {
      $employeedao = new EmployeeDAO();
      $arr = $employeedao->getAll();
      $employee = new Employee();
      $deptdao = new DepartmentDAO($employee);
      $GLOBALS['allDepartment'] = $deptdao->getAll();
      return $arr;
    }

    function add($emp_no,$emp_name,$departments) { 
      $employee = new Employee();
      $employee->emp_no = $emp_no;
      $employee->emp_name = $emp_name;
      $employee->departments = $departments;
      $result = $this->departmentService($employee->departments);
            if( $result == 'false') {
                 $result = "Please select correct department ";
                  return $result;
            } else {
               $employeedao = new EmployeeDAO();
              $result = $employeedao->add($employee);       
                return $result;     
            }
      }

    function update($emp_no,$emp_name,$departments) {
      $employee = new Employee();
      $employee->emp_no = $emp_no;
      $employee->emp_name = $emp_name;
      $employee->departments = $departments;
      $result = $this->departmentService($employee->departments);
            if( $result == 'false') {
                 $result = "Please select correct department ";
                  return $result;
            } else {
               $employeedao = new EmployeeDAO();
              $result = $employeedao->update($employee);       
                return $result;     
            }
    }

    function delete($emp_no) {
      $employee = new Employee();
      $employee->emp_no = $emp_no;
      $result = $this->departmentService($employee->departments);
            if( $result == 'false') {
                 $result = "Please select correct department ";
                  return $result;
            } else {
               $employeedao = new EmployeeDAO();
              $result = $employeedao->delete($emp_no);       
                return $result;     
            }
    }

}
?>