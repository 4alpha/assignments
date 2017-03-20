<?php
namespace Controller;
use DAO\EmployeeDAO as EmployeeDAO;
use Models\Employee as Employee;

class EmployeeController {
  private $objdao;
  private $key = ['no' => 'empno', 'fname' => 'fname', 'lname' => 'lname', 'bdate' => 'bdate', 'gender' => 'gender', 'hdate' => 'hiredate'];
  function __construct() {
    $this->objdao = new EmployeeDAO();
  }

  function add($data) { 
    $Obj = new Employee($data[$this->key['no']], $data[$this->key['fname']], $data[$this->key['lname']], $data[$this->key['bdate']], $data[$this->key['gender']], $data[$this->key['hdate']]);
    $result = $this->objdao->add($Obj);
    return $result;
  }

  function update($data) {
    $Obj = new Employee($data[$this->key['no']], $data[$this->key['fname']], $data[$this->key['lname']], $data[$this->key['bdate']], $data[$this->key['gender']], $data[$this->key['hdate']]); 
    $result = $this->objdao->update($Obj);
    return $result;
  }

  function delete($data) {
    $Obj = new Employee($data[$this->key['no']], $data[$this->key['fname']], $data[$this->key['lname']], $data[$this->key['bdate']], $data[$this->key['gender']], $data[$this->key['hdate']]); 
    $result = $this->objdao->delete($Obj);
    return $result;
  }

  function getrow($data) {
    $result = $this->objdao->getAll();
    return $result;
  }
   
}
?>
