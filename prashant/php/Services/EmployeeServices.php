<?php
namespace Services;
use DAO\EmployeeDAO as EmployeeDAO;
use Model\Employee as Employee;
class EmployeeServices {
	private $dao;
	function __construct() {
      $this->dao = new EmployeeDAO();
    }

		public function insert($emp_name, $address, $dob, $contact_no, $departments) {
			$buisnessValidation = new BuisnessValidation();
			$dept_no = $buisnessValidation->validDepartment($departments);
			print_r($dept_no);
			if($dept_no) {
				$employee = new Employee();
				$employee->emp_name = $emp_name;
				$employee->emp_address = $address;
				$employee->DOB = $dob;
				$employee->contact_no = $contact_no;
				$employee->departments = $dept_no;

				return $this->dao->insert($employee);
			} else {
				return "you can not select multi departments";
			}
		}

		public function update($emp_no,$emp_name, $address, $dob, $contact_no, $departments) {
			$buisnessValidation = new BuisnessValidation();
			$dept_no = $buisnessValidation->validDepartment($departments);
			print_r($dept_no);
			if($dept_no) {
				echo "true";
				$employee = new Employee();
				$employee->emp_no = $emp_no; 
				$employee->emp_name = $emp_name;
				$employee->emp_address = $address;
				$employee->DOB = $dob;
				$employee->contact_no = $contact_no;
				$employee->departments = $dept_no;
				return $this->dao->update($employee);
			} else {
				return "you can not select multi departments";
			}

		}

		public function getAll() {
      return $this->dao->getAll();
		}

		public function delete($emp_no) {
      return $this->dao->delete($emp_no);
    }
}