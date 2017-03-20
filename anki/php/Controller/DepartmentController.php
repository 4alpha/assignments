<?php
namespace Controller;
use DAO\DepartmentDAO as DepartmentDAO;
use Models\Department as Department; 

class DepartmentController {
  private $objdao;
  private $key = ['no' => 'deptno', 'name' => 'deptname'];
  function __construct() {
    $this->objdao = new DepartmentDAO();
  }

  function add($data) { 
    $Obj = new Department($data[$this->key['no']], $data[$this->key['name']]);
    $result = $this->objdao->add($Obj);
    return $result;
  }

  function update($data) {
      $Obj = new Department($data[$this->key['no']], $data[$this->key['name']]);
      $result = $this->objdao->update($Obj);
      return $result;
  } 

  function delete($data) {
    $Obj = new Department($data[$this->key['no']], $data[$this->key['name']]);
    $result = $this->objdao->delete($Obj);
    return $result;
  } 

  function getrow($data) {
    $result = $this->objdao->getAll();
    return $result;
  }  
}
?>
