<?php
  namespace DAO;
  use DB_Driver\DB;
  use DB_Exceptions\GetRecordException as GetRecordException;
  use DB_Exceptions\UpdateException as UpdateException;
  use DB_Exceptions\DeleteException as DeleteException;
  use DB_Exceptions\InsertException as InsertException;
  
  class DepartmentDAO implements DAO {    
    private $db;

    function __construct() {
      $this->db = DB::getConnection();
    }

    function get($id) {
      $query = "SELECT * FROM department WHERE dept_no = " . $id;
      try {
        $result = $this->db->get($query);
      return $result;
      } catch(GetRecordException $e) {
        return "Department Number : " . $id . $e->errorMessage();
      } 
    }

    function getAll() {
      $query = "SELECT  * FROM department ORDER BY dept_no";
      return $this->db->getAll($query);
    }

    function insert($department) {
      $query = "INSERT INTO department(dept_name,can_have_multi_departments) VALUES('" . $department->dept_name . "','" . $department->can_have_multi_departments ."')";
      try {
         $result = $this->db->insert($query);
        return "Record Inserted Successfully...";
      } catch(InsertException $e) {
        return $e->errorMessage();
      }
    }

    function update($department) {
      $query = "UPDATE department SET (dept_name,can_have_multi_departments) = ('"  . $department->dept_name ."','" . $department->can_have_multi_departments . "') WHERE dept_no = '" . $department->dept_no . "'";
      try {
        $result = $this->db->update($query);
        return "Record Updated Successfully...";
      } catch(UpdateException $e) {
        return "Department Number : $department->dept_no" . $e->errorMessage();
      } 
    }

    function delete($id) {
      $query = "DELETE FROM department WHERE dept_no = " . $id;
      try {
        $result = $this->db->delete($query);
        return "Record Deleted Successfully...";
      } catch(DeleteException $e) {
        return "Department Number : $id" . $e->errorMessage();
      }
    }
  }
?> 