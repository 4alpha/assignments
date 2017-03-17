<?php
    namespace Controller;
    use DAO\EmployeeDAO as EmployeeDAO;
    use Model\Employee as Employee;

    class EmployeeController { 
        private $dao;
        private $_keys = ['no' => 'emp_no', 'name' => 'emp_name', 'address' => 'address', 'dob' => 'DOB'];
        function __construct() {
            $this->dao = new EmployeeDAO();
        }

        function add($data) {
            $employee = new Employee($data[$this->_keys['no']], $data[$this->_keys['name']], $data[$this->_keys['address']], $data[$this->_keys['dob']]);
            return $this->dao->add($employee);
        }

        function get($data) {
            return $this->dao->get($data[$this->_keys['no']]);
        }

        function getAll() {
            $result = $this->dao->getAll();
            return $result;
        }

        function update($data) {
            $employee = new Employee($data[$this->_keys['no']], $data[$this->_keys['name']], $data[$this->_keys['address']], $data[$this->_keys['dob']]);
            return $this->dao->update($employee);
        }

        function delete($data) {
            return $this->dao->delete($data[$this->_keys['no']]);
        }
    }
?>