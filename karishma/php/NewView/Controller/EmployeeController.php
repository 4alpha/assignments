<?php 
namespace Controller;

use Model\Employee as Employee;
use DAO\EmployeeDAO as EmployeeDAO;

class EmployeeController {
  private $employee , $dao, $employee_no;
  
  public function __construct() {
    $employee_no = $_POST['emp_no'];
    $this->employee_no = $employee_no;
    $employee = new Employee($employee_no, $_POST['birth_date'], $_POST['first_name'], $_POST['last_name'],  $_POST['join_date']);
    $this->employee = $employee;
  }

  public function getRow($data){
    $this->dao = new EmployeeDAO($this->employee);
    $result = $this->dao->getRow();
    return $result;
  } 

    public function addData($data) {
        $this->dao = new EmployeeDAO( $this->employee );
        $result = $this->dao->addData( $this->employee );
        return $result;
    }

    public function updateData($data) {
        $this->dao = new EmployeeDAO( $this->employee );
        $result = $this->dao->updateData( $this->employee );
        return $result;
    } 

    public function delete($data) {
        $this->dao = new EmployeeDAO( $this->employee );
        $result = $this->dao->delete($this->employee_no);
        return $result;
    }
}
?>