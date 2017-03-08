<?php
include 'interfaceDAO.php';

class EmployeeDAO extends DAO {    
    private $db;
    function __construct() {
        $this->db = DAO::makeObject();
    }
    function get($emp_no) {        
        $query = "select * from employee where emp_no = ".$emp_no;
        return $this->db->get($query);
    }
    function getAll() {
        $query = "select * from employee ORDER BY emp_no";
        return $this->db->getAll($query);
    }
    function add($emp) {
       
        echo $emp->emp_name."name<br>";
        $query = "INSERT INTO employee(emp_name, address, birth_date) VALUES('". $emp->emp_name . "', '" . $emp->emp_address."', '".$emp->DOB. "')";
        return  $this->db->insert($query);
    }
    function update($emp) {
        $query = "UPDATE employee SET (emp_name, address, birth_date) = ('".$emp->emp_name."','".$emp->emp_address."','".$emp->DOB."') WHERE emp_no = '".$emp->emp_no."'";
        return $this->db->update($query);
    }
    function delete($emp_no) {
        $query = "DELETE FROM employee where emp_no = ".$emp_no;
        return $this->db->delete($query);
    }
}
?>