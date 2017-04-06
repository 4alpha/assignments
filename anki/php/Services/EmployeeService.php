<?php 
namespace Services;
use DAO\EmployeeDAO as EmployeeDAO;
use DAO\DepartmentDAO as DepartmentDAO;

class EmployeeService {
  // private $dao;
  // function __construct() {
  //   $this->dao = new EmployeeDAO();
  // }
  function __construct() {
    $this->dao = new DepartmentDAO();
  }
  
  function check_multiDepartment() {
    $result=$this->dao->getAll();
    print_r($result);
    // $db = pg_connect("host = localhost dbname = testdb user = postgres password = psql");
    // $sql = pg_query("SELECT * FROM departments");
    $flag = "true";
    $count = count($_POST['departments']);
    if($count != 1) {
      while ($rs = pg_fetch_array($sql)) {
        foreach($_POST['departments'] as $department) {
          if ($rs['dept_no'] == $department) {
            if ($rs['assign_status'] == 't') {
              continue;
            } else {
              $flag = "false";
            }
          }
        }
      }
    } else {
      return "true";
    }
    if ($flag == "true") {
      return "true";
    } else {
      return "false";
    }
  }
}
?>
