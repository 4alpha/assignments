<?php

  namespace Controller;
  use DAO\DepartmentDAO as DepartmentDAO;
  use Model\Department as Department;

  class DepartmentController { 
    private $dao;
	  private $_keys = ['no' => 'dept_no', 'name' => 'dept_name','multi_dept'=>'optradio'];
    function __construct() {
      $this->dao = new DepartmentDAO();
    }

    function insert($data) {
      $department = new Department();
      $department->dept_no = $data[$this->_keys['no']];
      $department->dept_name = $data[$this->_keys['name']];
      $department->can_have_multi_departments = $data[$this->_keys['multi_dept']];
      return $this->dao->insert($department);
    }

    function get($data) {
      return $this->dao->get($data[$this->_keys['no']]);
    }

    function getAll() {
      $result = $this->dao->getAll();
      return $result;
    }

    function update($data) {      
      $department = new Department();
      $department->dept_no = $data[$this->_keys['no']];
      $department->dept_name = $data[$this->_keys['name']];
      $department->can_have_multi_departments = $data[$this->_keys['multi_dept']];
      return $this->dao->update($department);
    }

    function delete($data) {
      return $this->dao->delete($data[$this->_keys['no']]);
    }
  }