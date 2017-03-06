<?php
include 'interfaceDAO.php';
class EmployeeDAO extends DAO {    
    private $emp;
    private $db;
    function __construct($emp) {
        $this->emp = $emp;
        $this->db = DAO::makeObject();
    }
    function get($emp_no) {        
        $query = "select * from employee where emp_no = ".$emp_no;
        return $this->db->executeQuery($query);
    }
    function getAll() {
        $query = "select * from employee ORDER BY emp_no";
        return $this->db->executeQuery($query);
    }
    function add($emp) {
        $query = "INSERT INTO employee(emp_name, address, birth_date) VALUES('". $this->emp->emp_name . "', '" . $this->emp->emp_address."', '".$this->emp->DOB. "')";
        return pg_affected_rows( $this->db->executeQuery($query) );
    }
    function update($emp) {
        $query = "UPDATE employee SET (emp_name, address, birth_date) = ('".$this->emp->emp_name."','".$this->emp->emp_address."','".$this->emp->DOB."') WHERE emp_no = '".$this->emp->emp_no."'";
        return pg_affected_rows($this->db->executeQuery($query) );
    }
    function delete($emp_no) {
        $query = "DELETE FROM employee where emp_no = ".$emp_no;
        return pg_affected_rows( $this->db->executeQuery($query) );
    }
}
?>