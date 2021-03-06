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

    public function getAll() {
      $query = "SELECT * FROM department";
      $result = $this->db->getAll($query);
      return $result;
    }
    public function getdept() {
      $query = "SELECT * FROM department";
      $result = $this->db->gettable($query);
      return $result;
    }

    public function add($department) {
      $query = "INSERT INTO department VALUES ('" . $department->dept_no . "', '" . $department->dept_name . "', '" . $department->can_have_multiple_department . "');";
      try {
        $result = "$department->dept_no" . " " . $this->db->add($query);
      } catch(AddException $e) {
          $result = "In Department table Department" . $e->idAlreadyExists();
          return $result;
      }
    }

    public function update($department) {
      $query = "UPDATE department SET dept_name = '" . $department->dept_name ."' where dept_no = '" . $department->id . "';";
      try {  
        $result = "$department->id" . " " . $this->db->update($query);
      } catch(UpdateException $e) {
        $result = "In Department table Department " . $e->idDoesNotExits();
        return $result;
      }
    }
    
    public function delete($id) {
      $query = "DELETE FROM department WHERE dept_no = '". $id ."'";
      try {  
        $result = "$department->id" . " " . $this->db->delete($query);
      }  catch(DeleteException $e) { 
        $result = "In Department table Department" . $e->idDoesNotExits();
        return $result;
      }
    }
  }
?>