<?php
  require 'DAO.php';
  class SalaryDAO implements DAO {
    public $dbpostgres;
    public $salary;
    function __construct($dbpostgres,$salary) {
      $this->dbpostgres = $dbpostgres;
      $this->salary = $salary;
      $this->dbpostgres->connect("host = localhost dbname = employees user = postgres password = psql");
    }
    function getAll() {
      $query = 'select * from salary;';
      $result = $this->dbpostgres->select($query);
      return $result;
    }
    function Insert() {
      echo $this->salary->emp_no;
      $query = "insert into salary values('".$this->salary->emp_no."','".$this->salary->basic."','".$this->salary->da."','".$this->salary->ma."','".$this->salary->ot."','".$this->salary->hra."','".$this->salary->ca."');";
      echo 'hi';
      $cnt = $this->dbpostgres->insert($query);
      return $cnt;
    }
    function Update() {
      $query = "update salary set basic_pay='".$this->salary->basic."', da='".$this->salary->da."', ma='".$this->salary->ma."', ot='".$this->salary->ot."', hra='".$this->salary->hra."', ca='".$this->salary->ca."' where emp_no = '".$this->salary->emp_no."';";
      $cnt = $this->dbpostgres->update($query);
      return $cnt;
    }
    function Delete() {
      $query = "delete from salary where emp_no = '".$this->salary->emp_no."';";
      $cnt = $this->dbpostgres->delete($query);
      return $cnt;
    }
  }
?>