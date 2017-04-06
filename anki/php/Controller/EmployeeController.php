<?php
namespace Controller;
use Services\EmployeeService as EmployeeService;
use DAO\EmployeeDAO as EmployeeDAO;
use Models\Employee as Employee;

class EmployeeController {
  private $dao;
  private $servieceemp;
  function __construct() {
    $this->dao = new EmployeeDAO();
    $this->servieceemp = new EmployeeService();
    $this->servieceemp->check_multiDepartment();
  }

  function add($data) { 
    $Obj = new Employee();
    $Obj->empno = $data['empno'];
    $Obj->fname = $data['fname'];
    $Obj->lname = $data['lname']; 
    $Obj->bdate = $data['bdate']; 
    $Obj->gender = $data['gender']; 
    $Obj->departments = $data['departments'];
    if (check_multiDepartment() == "true") {
      $result = $this->dao->add($Obj);
      return $result ;
    } else {
      return 'Can not select multiple department with facility';
    }
  }

  function update($data) {
    $Obj = new Employee();
    $Obj->empno = $data['empno'];
    $Obj->fname = $data['fname'];
    $Obj->lname = $data['lname']; 
    $Obj->bdate = $data['bdate']; 
    $Obj->gender = $data['gender']; 
    $Obj->departments = $data['departments'];
    if (check_multiDepartment() == "true") {
      $result = $this->dao->update($Obj);
      return $result;
    } else {
      return 'Can not select multiple department with facility';
    }
    
  }

  function delete($data) {
    $Obj = new Employee();
    $Obj->empno = $data['emp_no'];
    $Obj->fname = $data['fname'];
    $Obj->lname = $data['lname']; 
    $Obj->bdate = $data['bdate']; 
    $Obj->gender = $data['gender']; 
    $Obj->departments = $data['departments'];
    $result = $this->dao->delete($Obj);
    return $result;
  }

  function getrow($data) {
    
    $result = $this->dao->getAll();
    return $result;
  }
}
?>
