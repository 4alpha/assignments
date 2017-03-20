<?php
  namespace DAO;
  
  use DataBase\DB as DB;
  use DisplayException\DatabaseConnectionException as DatabaseConnectionException;
  use DisplayException\DeleteException as DeleteException;
  use DisplayException\AddException as AddException;
  use DisplayException\UpdateException as UpdateException;

  class DepartmentDAO implements DAO{
    public $db;
    public function __construct() {
      $this->db = DB::getConnection();
    }

    public function getAll(){
      $query = "SELECT * FROM department ORDER BY dept_no";
      $result = $this->db->getAll($query);
      return $result;
    }

    public function add($department){
      $query = "INSERT INTO department VALUES ('" . $department->deptno . "' , '" . $department->id . "' , '" . $department->deptname . "');";
      $result = "$department->deptno" . " " . $this->db->add($query);
      $result = "In Department table Department" . $result;
      return $result;
    }

    public function update($department){
      $query = "UPDATE department SET dept_name = '" . $department->deptname ."' where dept_no = '" . $department->deptno . "';";
      $result = "$department->deptno" . " " . $this->db->update($query);
      $result = "In Department table Department" . $result;
      return $result;
    }
    
    public function delete($department){
      $query = "DELETE FROM department WHERE dept_no = '". $department->deptno ."'";
       $result = "$department->deptno" . " " . $this->db->delete($query);
      $result = "In Department table Department" . $result;
      return $result;
    }
  }
?>