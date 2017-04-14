<?php 
namespace Services;
use DAO\DepartmentDAO as DepartmentDAO;
class DepartmentServices {
  public $dao;
  function getAllDepartments() {
  $dao = new DepartmentDAO();
  $GLOBALS['allDepartments'] = $dao->getAll();
  }
}
?>