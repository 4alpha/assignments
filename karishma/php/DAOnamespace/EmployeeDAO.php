<?php
namespace DAOnamespace;
use DBnamespace\DBconnection;

 class EmployeeDAO implements DAO {
    
    public $employee, $db_object;
    function __construct( $employee ) {
      $this->employee = $employee;
      $db_object = \DBnamespace\DBconnection::getConnection();
      $this->db_object = $db_object;
    }

  function getRow() {
    $query = "SELECT * FROM employees";
    try {
      $result = $this->db_object->getRow( $query );
      return $result;
    } catch( fetch $e ) {
      return $e->getRowException();
    }
  }

  function addData( $employee ) {
    $query ="INSERT INTO employees VALUES( $employee->employee_no, '$employee->birth_date', '$employee->first_name', '$employee->last_name', '$employee->join_date');";
    try {
      return $this->db_object->addData( $query );
    } catch(insert $e) {
      return $e->addException();
    }
  }

  function updateData( $employee ) {
    $query = "UPDATE employees SET birth_date = '$employee->birth_date', first_name = '$employee->first_name', last_name = '$employee->last_name',join_date = '$employee->join_date' WHERE emp_no = $employee->employee_no;";
    try {
      return $this->db_object->updateData( $query );
    } catch( update $e ) {
      return $e->updateDataException()."query status :".pg_result_status($result)."<br> ";
    }
  }

  function delete($employee_no) {
    $query = "DELETE FROM employees WHERE emp_no = $employee_no;";
    try {
      return $this->db_object->delete( $query );
    } catch( delete $e ) {
      return $e-> deleteException();
    }
  }
 }
 ?>
