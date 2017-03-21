<?php
namespace DAO;

use DataBase\DBconnection;
use DataBaseException\FetchRecordException as FetchRecordException;
use DataBaseException\InsertRecordException as InsertRecordException;
use DataBaseException\UpdateRecordException as UpdateRecordException;
use DataBaseException\DeleteRecordException as DeleteRecordException;

 class EmployeeDAO implements DAO {
    
    public $employee, $db;
    function __construct( $employee ) {
      $this->employee = $employee;
      $db = \DataBase\DBconnection::getConnection();
      $this->db = $db;
    }

  function getRow() {
    $query = "SELECT * FROM employees";
    try {
      $result = $this->db->getRow( $query );
      return $result;
    } catch( FetchRecordException $e ) {
      return $e->getRowException();
    }
  }

  function addData( $employee ) {
    $query = "INSERT INTO employees VALUES( $employee->employee_no, '$employee->birth_date', '$employee->first_name', '$employee->last_name', '$employee->join_date');";
    try {
      return $this->db->addData( $query );
    } catch(InsertRecordException $e) {
      return $e->addException();
    }
  }

  function updateData( $employee ) {
    $query = "UPDATE employees SET birth_date = '$employee->birth_date', first_name = '$employee->first_name', last_name = '$employee->last_name',join_date = '$employee->join_date' WHERE emp_no = $employee->employee_no;";
    try {
      return $this->db->updateData( $query );
    } catch( UpdateRecordException $e ) {
      return $e->updateDataException();
    }
  }

  function delete($employee_no) {
    $query = "DELETE FROM employees WHERE emp_no = $employee_no;";
    try {
      return $this->db->delete( $query );
    } catch( DeleteRecordException $e ) {
      return $e-> deleteException();
    }
  }
 }
 ?>
