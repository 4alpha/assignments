<?php
include 'employee.php';
include 'employeeDAO.php';

//$obj = (object) array('emp_name'=>$_POST['emp_name'],'emp_address'=>$_POST['emp_address'],'DOB'=>$_POST['DOB']);   
class employeeController { 
    private $empDAO;
    function __construct() {
        $this->empDAO = new EmployeeDAO();
    }  
    function add() {
        $emp = new Employee($_POST['emp_no'], $_POST['emp_name'], $_POST['emp_address'], $_POST['DOB']);
        return $this->empDAO->add($emp);


    }   
    function get() {
        return $this->empDAO->get($_POST['emp_no']);
        
    }
    function getAll() {
        $result = $this->empDAO->getAll();
        return $result;
    }
    function update() {
        $emp = new Employee($_POST['emp_no'], $_POST['emp_name'], $_POST['emp_address'], $_POST['DOB']);
        return $this->empDAO->update($emp);
        
    }
    function delete() {
        return $this->empDAO->delete($_POST['emp_no']);
        
    }
}
?>