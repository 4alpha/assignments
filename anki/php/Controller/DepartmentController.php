<?php
namespace Controller;
use DAO\DepartmentDAO as DepartmentDAO;
use Models\Departments as Departments; 

class DepartmentController {
  private $objdao;
  private $key = ['no' => 'deptno', 'name' => 'deptname'];
  function __construct() {
    $this->objdao = new DepartmentDAO();
  }

  function add($data) { 
    $Obj = new Departments($data[$this->key['no']], $data[$this->key['name']]);
    $result = $this->objdao->addDAO($Obj);
    return $result;
  }

  function update($data) {
      $Obj = new Departments($data[$this->key['no']], $data[$this->key['name']]);
      $result = $this->objdao->updateDAO($Obj);
      return $result;
  } 

  function delete($data) {
    $Obj = new Departments($data[$this->key['no']], $data[$this->key['name']]);
    $result = $this->objdao->deleteDAO($Obj);
    return $result;
  } 

  function getrow($data) {
    $result = $this->objdao->getAll();
    return $result;
  }  
}
?>
