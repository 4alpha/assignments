<?php

interface Employees {
  public function insertEmp($empno,$fname,$lname,$bdate,$gender,$hdate);
  public function updateEmp($empno,$fname,$lname,$bdate,$gender,$hdate);
  public function deleteEmp($empno);
  public function selectEmp();
}

?>
