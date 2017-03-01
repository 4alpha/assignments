<?php
interface DataBase {
  public function select();
  public function insert($emp_no, $firstName, $lastName, $hireDate);
  public function update($emp_no, $firstName, $lastName, $hireDate);
  public function delete($emp_no);
}
?>