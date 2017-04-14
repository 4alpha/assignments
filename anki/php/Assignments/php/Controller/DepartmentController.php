<?php
namespace Controller;
use DAO\DepartmentDAO as DepartmentDAO;
use Models\Department as Department; 

class DepartmentController {
  private $dao;
  function __construct() {
    $this->dao = new DepartmentDAO();
  }

  function add($data) {
    $Obj = new Department();
    $Obj->deptno = $data['deptno'];
    $Obj->deptname = $data['deptname'];
    $Obj->status = $data['status']; 
    $result = $this->dao->add($Obj);
    return $result;
  }

  function update($data) {
    $Obj = new Department();
    $Obj->deptno = $data['deptno'];
    $Obj->deptname = $data['deptname'];
    $Obj->status = $data['status'];
    $result = $this->dao->update($Obj);
    return $result;
  } 

  function delete($data) {
    $Obj = new Department();
    $Obj->deptno = $data['dept_no'];
    $Obj->deptname = $data['deptname'];
    $Obj->status = $data['status'];
    $result = $this->dao->delete($Obj);
    return $result;
  } 

  function getrow() {
    $result = $this->dao->getAll();
    return $result;
  }  
}
?>
