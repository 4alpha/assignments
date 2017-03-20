<?php 
namespace controllerNamespace;

use classNamespace\Employee as Employee;
use DAOnamespace\EmployeeDAO as EmployeeDAO;

class EmployeeController {
  private $employee , $employeeDao, $employee_no, $birth_date, $first_name, $last_name, $join_date;
  
  public function __construct() {
    $employee_no = $_POST['emp_no'];
    $birth_date = $_POST['birth_date'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $join_date = $_POST['join_date'];
    $this->employee_no = $employee_no;
    $employee = new Employee($employee_no, $birth_date, $first_name, $last_name, $join_date);
    $this->employee = $employee;
  }

  public function getRow($data){
    $this->employeeDao = new EmployeeDAO($this->employee);
    $result = $this->employeeDao->getRow();
    return $result;
  } 

    public function addData($data) {
        $this->employeeDao = new EmployeeDAO( $this->employee );
        $result = $this->employeeDao->addData( $this->employee );
        return $result;
    }

    public function updateData($data) {
        $this->employeeDao = new EmployeeDAO( $this->employee );
        $result = $this->employeeDao->updateData( $this->employee );
        return $result;
    } 

    public function delete($data) {
        $this->employeeDao = new EmployeeDAO( $this->employee );
        $result = $this->employeeDao->delete($this->employee_no);
        return $result;
    }
}
?>