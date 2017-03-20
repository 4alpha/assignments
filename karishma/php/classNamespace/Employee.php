<?php
namespace classNamespace;

class Employee { 
    public $emp_no, $birth_date, $first_name, $last_name, $join_date;
    public function __construct($emp_no, $birth_date, $first_name, $last_name, $join_date) {
        $this->emp_no = $emp_no;
        $this->birth_date = $birth_date;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->join_date = $join_date;
    }
}  
  
?>
