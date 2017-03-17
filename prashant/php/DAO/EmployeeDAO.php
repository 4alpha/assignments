<?php
namespace DAO;
use DB_Driver\DB;
class EmployeeDAO implements DAO {    
    private $db;
    function __construct() {
        $this->db = DB::loadDriver();
    }
    /*
    function get($id) {
        $query = "SELECT * FROM employee WHERE emp_no = " . $id;
        try {
            $result = $this->db->get($query);
            return $result;
        } catch (ResultException $e) {
             return "Error getting employee data";
        }
    }
    */
    function get($id) {
            $query = "SELECT * FROM employee WHERE emp_no = " . $id;
            $result = $this->db->get($query);
            if(gettype($result) == "array") {
                return $result;
            } else {
                return "Employee Number :" . $id . " " . $result;
            } 
    }

    function getAll() {
        $query = "SELECT  * FROM employee ORDER BY emp_no";
        return $this->db->getAll($query);
    }

    function add($employee) {       
        echo $employee->emp_name . "name<br>";
        $query = "INSERT INTO employee(emp_name, address, birth_date) VALUES('" . $employee->emp_name . "', '" . $employee->emp_address."', '". $employee->DOB . "')";
        return  $this->db->insert($query);
    }

    function update($employee) {
            $query = "UPDATE employee SET (emp_name, address, birth_date) = ('".$employee->emp_name."','".$employee->emp_address."','".$employee->DOB."') WHERE emp_no = '".$employee->emp_no."'";
            $result = "Employee Number:" . $employee->emp_no . " " . $this->db->update($query);
            return $result;
    }

    function delete($id) {
            $query = "DELETE FROM employee WHERE emp_no = ".$id;
            $result = "Employee Number:" . $id . " " . $this->db->delete($query);
            return $result;
    }
}
?> 