<?php
  
  // $emp_no = $_POST['emp_no'];
  // $firstName = $_POST['firstName'];
  // $lastName = $_POST['lastName'];
  // $hireDate = $_POST['hireDate'];
  
  
  // $emp = new Employee($emp_no, $firstName, $lastName, $hireDate);
  // $empdao = new EmployeeDAO($emp);
  // $empctrl = new EmpController($emp_no,$firstName,$lastName,$hireDate);
  // echo $emp_no;

  if(isset($_POST['getRow']))
  {
    include 'controller.php';
  }
  if(isset($_POST['addRow']))
  {
    
    // $cnt = $empdao->Insert();
    if($result == 1) {
        echo "inserted successfully";
    } else {
        echo "not inserted successfully";
    }
  }
  if(isset($_POST['updateRow']))
  {
    // $cnt = $empdao->Update();
    if($result == 1) {
      echo "updated successfully";
    } else {
      echo "not updated successfully";
    }
  }
  if(isset($_POST['deleteRow']))
  {
    // $cnt = $empdao->Delete($emp_no);
    if($result == 1) {
      echo "deleted successfully";
    } else {
      echo "not deleted successfully";
    }
  }
?>