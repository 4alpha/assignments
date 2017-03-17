<?php
  namespace DataAccessObject;
  use ConfigurationFile\Configuration as Configuration;

  class SalaryDAO implements DAO {
    public $dbpostgres;   
    function __construct() {
      $this->dbpostgres = Configuration::getDatabaseConnection();
    }
    
    function getAll() {
      $query = 'SELECT * FROM salary;';
      $result = $this->dbpostgres->select($query);
      return $result;
    }
    
    function Insert($salary) {
      $query = "INSERT INTO salary VALUES('".$salary->emp_no."','".$salary->basic."','".$salary->da."','".$salary->ma."','".$salary->ot."','".$salary->hra."','".$salary->ca."');";
      $result = $this->dbpostgres->insert($query);
      return $result;
    }
    
    function Update($salary) {
      $query = "UPDATE salary SET basic_pay='".$salary->basic."', da='".$salary->da."', ma='".$salary->ma."', ot='".$salary->ot."', hra='".$salary->hra."', ca='".$salary->ca."' where emp_no = '".$salary->emp_no."';";
      $result = $this->dbpostgres->update($query);
      return $result;
    }
    
    function Delete($emp_no) {
      $query = "DELETE FROM salary WHERE emp_no = '".$emp_no."';";
      $result = $this->dbpostgres->delete($query);
      return $result;
    }
    
  }
?>