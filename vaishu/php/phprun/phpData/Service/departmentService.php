<?php 
namespace Service;
use DAO\EmployeeDAO as EmployeeDAO;
use DAO\DepartmentDAO as DepartmentDAO;

  class DepartmentService {
    private $departmentdao;
    function __construct() {
      $this->departmentdao = new DepartmentDAO();
      $this->employeedao = new EmployeeDAO();
    }
   
  }
?>