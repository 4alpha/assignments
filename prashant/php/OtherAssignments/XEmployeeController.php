<?php
namespace Controller;
ini_set('display_errors',1);
use DAO\EmployeeDAO as EmployeeDao;
use Model\Employee as Employee;
class EmployeeController { 
    private $employeeDAO;
    function __construct() {
        $this->employeeDAO = new EmployeeDAO();
    }

    function add() {
        $employee = new Employee($_POST['emp_no'], $_POST['emp_name'], $_POST['emp_address'], $_POST['DOB']);
        return $this->employeeDAO->add($employee);
    }

    function get() {
        return $this->employeeDAO->get($_POST['emp_no']);
    }

    function getAll() {
        $result = $this->employeeDAO->getAll();
        return $result;
    }

    function update() {
        $employee = new Employee($_POST['emp_no'], $_POST['emp_name'], $_POST['emp_address'], $_POST['DOB']);
        return $this->employeeDAO->update($employee);
    }

    function delete() {
        return $this->employeeDAO->delete($_POST['emp_no']);
    }
}
?>