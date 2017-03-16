<?php  
  interface DAO {
    public function getAll();
    public function Insert($employee);
    public function Update($employee);
    public function Delete($emp_no);
  }
?>
