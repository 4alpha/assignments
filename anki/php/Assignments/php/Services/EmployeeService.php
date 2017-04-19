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
    echo "in check";
    $result=$this->deptdao->statusFalse();
    print_r($result);
    print_r($departments);
    $flag = "true";
    $count = count($departments);
    if($count != 1) {
      foreach($result as $rs) {
        foreach($departments as $dept) { 
          if ($rs['dept_no'] == $dept) {
            if ($rs['assign_status'] == 't') {
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

  function add($empno,$firstname,$lastname,$birthdate,$gender,$departments) { 
    echo "hii addddddd";
    $Obj = new Employee();
    $Obj->empno = $empno;
    $Obj->fname = $firstname;
    $Obj->lname = $lastname;
    $Obj->bdate = $birthdate;
    $Obj->gender = $gender;
    $Obj->departments = $departments;
    echo "hii addddddd";
    if($this->check_multiDepartment($Obj->departments)) {
      $result = $this->empdao->add($Obj);
      return $result ;
    } else { 
      return "error";
    }
  }

  function update($empno,$firstname,$lastname,$birthdate,$gender,$departments) {
    $Obj = new Employee();
    $Obj->empno = $empno;
    $Obj->fname = $firstname;
    $Obj->lname = $lastname;
    $Obj->bdate = $birthdate;
    $Obj->gender = $gender;
    $Obj->departments = $departments;
    $result = $this->empdao->update($Obj);
    return $result;
  }

  function delete($empno) {
    $Obj = new Employee();
    $Obj->empno = $empno;
    $result = $this->empdao->delete($Obj);
    return $result;
  }

  function getrow() {
    $result = $this->empdao->getAll();
    return $result;
  }
}
?>
