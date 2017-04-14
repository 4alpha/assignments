<?php 
  spl_autoload_register(function ($class_name) {
    $class_name = str_replace("\\","/",$class_name.'.php');
    include $class_name;
  });
  $emp_no = 4;
  $firstName = 'first';
  $lastName = 'testcase';
  $hireDate = "12-12-2017";
  $departments = ["1", "2"];
  $employee = ['emp_no' => $emp_no, 'firstName' => $firstName,
               'lastName' => $lastName, 'hireDate' => $hireDate, 
               $departments];

  print_r($employee);

  $controller = 'Controllers\\' . 'EmployeeController';
  $ctrl = new $controller();


  // ------test ----
  $result = $ctrl->addRow($employee);
  if($result == "Record inserted successfully") {
    echo "add employee test ok";
  } else {
    echo "add employee test fails";
  }

  // -----test-----
  $result = $ctrl->getRow();
  $result = array_filter($result);
  if(empty($result)) {
    echo "test case fails";
  } else {
    echo "getting all value from employee is ok";
  }



?>