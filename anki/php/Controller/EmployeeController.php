<?php
namespace Controller;
use DAO\EmployeeDAO as EmployeeDAO;
use Models\Employee as Employee;

class EmployeeController {
  private $dao;
  private $key = ['no' => 'empno', 'fname' => 'fname', 'lname' => 'lname', 'bdate' => 'bdate', 'gender' => 'gender'];
  function __construct() {
    $this->dao = new EmployeeDAO();
  }

  function add($data) { 
    $Obj = new Employee($data[$this->key['no']], $data[$this->key['fname']], $data[$this->key['lname']], $data[$this->key['bdate']], $data[$this->key['gender']]);
    $result = $this->dao->add($Obj);
    return $result;
  }

  function update($data) {
    $Obj = new Employee($data[$this->key['no']], $data[$this->key['fname']], $data[$this->key['lname']], $data[$this->key['bdate']], $data[$this->key['gender']]); 
    $result = $this->dao->update($Obj);
    return $result;
  }

  function delete($data) {
    $Obj = new Employee($data[$this->key['no']], $data[$this->key['fname']], $data[$this->key['lname']], $data[$this->key['bdate']], $data[$this->key['gender']]); 
    $result = $this->dao->delete($Obj);
    return $result;
  }

  function getrow($data) {
    $result = $this->dao->getAll();
    return $result;
  }
}
?>
