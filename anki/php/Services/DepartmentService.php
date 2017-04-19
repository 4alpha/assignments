<?php
namespace Services;
use DAO\DepartmentDAO as DepartmentDAO;

class DepartmentService {
  private $deptdao;
  function __construct() {
    $this->deptdao = new DepartmentDAO();
    $GLOBALS['deptName'] = $this->deptdao->getDepartmentName();
  }
}