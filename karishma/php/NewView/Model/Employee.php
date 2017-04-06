<?php
namespace Model;

class Employee { 
    public $employee_no, $birth_date, $first_name, $last_name, $join_date;
    public function __construct($employee_no, $birth_date, $first_name, $last_name, $join_date) {
        $this->employee_no = $employee_no;
        $this->birth_date = $birth_date;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->join_date = $join_date;
    }
}  
  
?>
