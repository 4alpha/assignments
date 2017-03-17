<?php
  namespace DAO;
  // use Configration\Config as Config;
  use DataBase\DB as DB;
  class EmployeeDAO implements InterfaceDAO{
    public $db;
    public function __construct() {
      $this->db = DB::getConnection();
    }

    public function getAll(){
      $query = "SELECT * from employee order by emp_no";
      $result = $this->db->getAll($query);
      return $result;
    }

    public function add($employee){
      $query = "INSERT INTO employee VALUES ('". $employee->id ."','". $employee->name ."');";
      $result = "$employee->id" . $this->db->add($query);
      $result1 = "In Employee table employee ".$result;
      return $result1;
    }

    public function update($employee){
      $query = "UPDATE employee set emp_name = '". $employee->name ."' where emp_no = '". $employee->id ."';";
      $result = "$employee->id" . $this->db->update($query);
      $result1 = "In Employee table employee ".$result;
      return $result1;
    }
    
    public function delete($employee){
      $query = "DELETE FROM employee where emp_no ='". $employee->id ."'";
      $result = "$employee->id". $this->db->delete($query);
      $result1 = "In Employee table employee " . $result;
      return $result1;
    }
  }
?>