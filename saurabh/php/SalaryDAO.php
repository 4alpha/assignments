<?php
  require_once 'DAO.php';
  class SalaryDAO extends DAO {
    public $dbpostgres;
    function __construct() {
      $this->dbpostgres = DAO::__construct();
    }
    function getAll() {
      $query = 'select * from salar;';
      $result = $this->dbpostgres->select($query);
      return $result;
    }
    function Insert($salary) {
      $query = "insert into salary values('".$salary->emp_no."','".$salary->basic."','".$salary->da."','".$salary->ma."','".$salary->ot."','".$salary->hra."','".$salary->ca."');";
      $cnt = $this->dbpostgres->insert($query);
      return $cnt;
    }
    function Update($salary) {
      $query = "update salary set basic_pay='".$salary->basic."', da='".$salary->da."', ma='".$salary->ma."', ot='".$salary->ot."', hra='".$salary->hra."', ca='".$salary->ca."' where emp_no = '".$salary->emp_no."';";
      $cnt = $this->dbpostgres->update($query);
      return $cnt;
    }
    function Delete($emp_no) {
      $query = "delete from salary where emp_no = '".$emp_no."';";
      $cnt = $this->dbpostgres->delete($query);
      return $cnt;
    }
  }
?>