<?php 
namespace Services;
use DAO\EmployeeDAO as EmployeeDAO;
use DAO\DepartmentDAO as DepartmentDAO;
use Models\Employee as Employee;

class EmployeeService {
  private $deptdao;
  private $emp;
  function __construct() {
    $this->deptdao = new DepartmentDAO();
    $this->empdao = new EmployeeDAO();
  }
  
  function check_multiDepartment() {
    print_r($_POST['departments']);
    $result=$this->deptdao->getAll();
    print_r($result);
    $flag = "true";
    $count = count($_POST['departments']);
    if($count != 1) {
      while ($rs = pg_fetch_array($sql)) {
        foreach($_POST['departments'] as $department) {
          if ($rs['dept_no'] == $department) {
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
    $Obj = new Employee();
    $Obj->empno = $empno;
    $Obj->fname = $firstname;
    $Obj->lname = $lastname;
    $Obj->bdate = $birthdate;
    $Obj->gender = $gender;
    $Obj->departments = $departments;
    $result = $this->empdao->add($Obj);
    return $result ;
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

  function getrow($data) {
    $result = $this->empdao->getAll();
    return $result;
  }
}
?>
