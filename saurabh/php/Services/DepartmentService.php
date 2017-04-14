<?php
  namespace Services; 
  use DataAccessObject\DepartmentDAO as DepartmentDAO;
  
  class DepartmentService {
    private $dao;
    function __construct() {
      $this->dao = new DepartmentDAO();
      $GLOBALS["departments"] = $this->dao->getALL();
      // print_r($GLOBALS["departments"]);
    }
  }

?>