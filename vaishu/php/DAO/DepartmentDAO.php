<?php
  namespace DAO;
  use DataBase\DB as DB;
  class DepartmentDAO implements InterfaceDAO{
    public $db;
    public function __construct() {
      $this->db = DB::getConnection();
    }

    public function getAll(){
      $query = "SELECT * from department order by dept_no";
      $result = $this->db->getAll($query);
      return $result;
    }

    public function add($department){
      $query ="INSERT INTO department VALUES ('".$department->deptno."' , '".$department->id."' , '".$department->deptname."');";
      $result = "$department->deptno".$this->db->add($query);
      $result1 = "In Department table Department".$result;
      return $result1;
    }

    public function update($department){
      $query = "UPDATE department set dept_name = '".$department->deptname."' where dept_no = '".$department->deptno."';";
      $result = $department->deptno."".$this->db->update($query);
      $result1 = "In Department table Department".$result;
      return $result1;
    }
    
    public function delete($department){
      $query = "DELETE FROM department where dept_no = '".$department->deptno."'";
       $result = "$department->deptno".$this->db->delete($query);
      $result1 = "In Department table Department".$result;
      return $result1;
    }
  }
?>