<?php
    class Employee {
        private $emp_no;
        private $emp_name;
        private $emp_address;
        private $DOB;
        function __construct($emp_no, $emp_name, $emp_address, $DOB) {
            $this->emp_no = $emp_no;
            $this->emp_name = $emp_name;
            $this->emp_address = $emp_address;
            $this->DOB = $DOB;
        }
    } 
?>