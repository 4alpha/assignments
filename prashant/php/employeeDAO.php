<?php
include 'interfaceDAO.php';
class EmployeeDAO implements DAO {
    private $db;
    private $emp;   
    function __construct($db, $emp) {
        $this->db = $db;
        $this->emp = $emp;
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
        $query = "INSERT INTO employee(emp_name, address, birth_date) VALUES('". $this->emp->emp_name . "', '" . $this->emp->emp_address."', '".$this->emp->DOB. "')";
        return pg_affected_rows( $this->db->Insert($query) );
    }
    function update($emp) {
        $query = "UPDATE employee SET (emp_name, address, birth_date) = ('".$this->emp->emp_name."','".$this->emp->emp_address."','".$this->emp->DOB."') WHERE emp_no = '".$this->emp->emp_no."'";
        return pg_affected_rows( $this->db->Update($query) );
    }
    function delete($emp_no) {
        $query = "DELETE FROM employee where emp_no = ".$emp_no;
        return pg_affected_rows( $this->db->Delete($query) );
    }
}
?>