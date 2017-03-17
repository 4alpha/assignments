<?php
namespace Controller;
use DAO\EmployeeDAO as EmployeeDAO;
use Models\Employee as Employee;

class EmployeeController {
  private $objdao;
  private $key = ['no' => 'emp_no', 'fname' => 'first_name', 'lname' => 'last_name', 'bdate' => 'birth_date', 'gender' => 'gender', 'hdate' => 'hire_date'];
  function __construct() {
    $this->objdao = new EmployeeDAO();
  }

  function add($data) { 
    $Obj = new Employee($data[$this->key['no']], $data[$this->key['fname']], $data[$this->key['lname']], $data[$this->key['bdate']], $data[$this->key['gender']], $data[$this->key['hdate']]);
    $result = $this->objdao->addDAO($Obj);
    return $result;
  }

  function update($data) {
    $Obj = new Employee($data[$this->key['no']], $data[$this->key['fname']], $data[$this->key['lname']], $data[$this->key['bdate']], $data[$this->key['gender']], $data[$this->key['hdate']]); 
    $result = $this->objdao->updateDAO($Obj);
    return $result;
  }

  function delete($data) {
    $Obj = new Employee($data[$this->key['no']], $data[$this->key['fname']], $data[$this->key['lname']], $data[$this->key['bdate']], $data[$this->key['gender']], $data[$this->key['hdate']]); 
    $result = $this->objdao->deleteDAO($Obj);
    return $result;
  }

  function getrow($data) {
    $result = $this->objdao->getAll();
    return $result;
  }
   
}
?>
