<?php
  namespace DataAccessObject;
  use DatabaseFiles\Database as Database;
  use ConfigurationFile\Configuration as Configuration;

  class SalaryDAO implements DAO {
    private $dbpostgres;   
    function __construct() {
      $this->dbpostgres = Database::getDatabaseConnection();
    }
    
    function getAll() {
      $query = 'SELECT * FROM salary;';
      return $this->dbpostgres->select($query);
    }
    
    function insert($salary) {
      $query = "INSERT INTO salary VALUES('".$salary->emp_no."','".$salary->basic."','".$salary->da."','".$salary->ma."','".$salary->ot."','".$salary->hra."','".$salary->ca."');";
      return $this->dbpostgres->insert($query);
    }
    
    function update($salary) {
      $query = "UPDATE salary SET basic_pay='".$salary->basic."', da='".$salary->da."', ma='".$salary->ma."', ot='".$salary->ot."', hra='".$salary->hra."', ca='".$salary->ca."' where emp_no = '".$salary->emp_no."';";
      return $this->dbpostgres->update($query);
    }
    
    function delete($emp_no) {
      $query = "DELETE FROM salary WHERE emp_no = '".$emp_no."';";
      return $this->dbpostgres->delete($query);
    }
    
  }
?>