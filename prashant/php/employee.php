<?php
    class Employee {
        var $emp_no;
        var $emp_name;
        var $emp_address;
        var $DOB;
        function __construct($emp_no, $emp_name, $emp_address, $DOB) {
            $this->emp_no = $emp_no;
            $this->emp_name = $emp_name;
            $this->emp_address = $emp_address;
            $this->DOB = $DOB;
        }
    } 
?>