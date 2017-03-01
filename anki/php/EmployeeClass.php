<?php
class Employee {
  private $db;
  function __construct($db) {
    $this->db=$db;
  }

  function addEmployee($empno,$fname,$lname,$bdate,$gender,$hdate) {
    $ans1 = $this->db->insertEmp($empno,$fname,$lname,$bdate,$gender,$hdate);
    return $ans1;
  }

  function updateemp($empno,$fname,$lname,$bdate,$gender,$hdate) {
    $ans2 = $this->db->updateEmp($empno,$fname,$lname,$bdate,$gender,$hdate);
    return $ans2;
  } 

  function deleteemp($empno) {
    $ans3 = $this->db->deleteEmp($empno,$fname,$lname,$bdate,$gender,$hdate);
    return $ans3;
  }  

  function getrowemp() {
    $ans4 = $this->db->selectEmp($empno,$fname,$lname,$bdate,$gender,$hdate);
    return $ans4;
  } 
}
?>