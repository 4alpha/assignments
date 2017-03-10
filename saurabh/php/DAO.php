<?php

  include_once 'DBPostgres.php';
  abstract class DAO {
    function __construct() {
      $DB = parse_ini_file("config.ini");
      if($DB['DRIVER']=='Postgres') {
        $dbpostgres = new DBPostgres();
        return $dbpostgres;
      } else {
        return 'Driver not found';
      }
    }
    abstract protected function getAll();
    abstract protected function Insert($employee);
    abstract protected function Update($employee);
    abstract protected function Delete($emp_no);
  }
?>
