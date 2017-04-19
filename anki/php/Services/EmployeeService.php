<?php 
namespace Services;
use DAO\EmployeeDAO as EmployeeDAO;
use DAO\DepartmentDAO as DepartmentDAO;
use Models\Employee as Employee;

class EmployeeService {
  private $deptdao;
  private $empdao;
  function __construct() {
    $this->deptdao = new DepartmentDAO();
    $this->empdao = new EmployeeDAO();
  }
  
  function check_multiDepartment($departments) {
    $result=$this->deptdao->statusFalse();
    $flag = "yes";
    $count = count($departments);
    if($count != 1) {
      foreach($result as $rs) {
        foreach($departments as $dept) { 
          if ($rs['dept_no'] == $dept) {
            if ($rs['assign_status'] == 't') {
              continue;
            } else {
              $flag = "no";
            }
          }
        }
      }
      if ($flag == "yes") {
        return true;
      } else {
        return false;
      }
    } else {
      return true;
    } 
  }

  function add($firstname,$lastname,$birthdate,$gender,$departments) { 
    $Obj = new Employee();
    $Obj->fname = $firstname;
    $Obj->lname = $lastname;
    $Obj->bdate = $birthdate;
    $Obj->gender = $gender;
    $Obj->departments = $departments;
    if($this->check_multiDepartment($Obj->departments)) {
      $result = $this->empdao->add($Obj);
      return $result ;
    } else { 
      return "Can not select Multiple department with facility";
    }
  }

  function update($emp_no,$firstname,$lastname,$birthdate,$gender,$departments) {
    $Obj = new Employee();
    $Obj->emp_no = $emp_no;
    $Obj->fname = $firstname;
    $Obj->lname = $lastname;
    $Obj->bdate = $birthdate;
    $Obj->gender = $gender;
    $Obj->departments = $departments;
    if($this->check_multiDepartment($Obj->departments)) {
      $result = $this->empdao->update($Obj);
      return $result;
    } else { 
      return "Can not select Multiple department with facility";
    }
  }

  function delete($emp_no) {
    $Obj = new Employee();
    $Obj->emp_no = $emp_no;
    $result = $this->empdao->delete($Obj);
    return $result;
  }

  function getrow() {
    $result = $this->empdao->getAll();
    return $result;
  }
}
?>
