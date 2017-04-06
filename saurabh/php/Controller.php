
<?php
  // ini_set('display_errors', 1);
 
  spl_autoload_register(function ($class_name) {
    $class_name = str_replace("\\","/",$class_name.'.php');
    include $class_name;
  });

  $filename = $_POST['view'];
  $controller = 'Controllers\\' . $filename.'Controller';
  $controller = 'Controllers\\' . 'EmployeeController';
  $ctrl = new $controller();

  $result = $ctrl->getRow();
    
  $action = $_REQUEST['submit'];    
  if ($action == "addRow" || $action == "updateRow") {
    if($_POST['emp_no'] && $_POST['firstName'] && $_POST['lastName'] && $_POST['hireDate'])
      $answer = " <div class='container'>
                    <center>
                    <div class='col-sm-7 alert alert-success' role='alert'>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                      " . $ctrl->{$action}($_REQUEST) . "
                    </div>
                    </center> 
                  </div>";
    else
      echo '<script>alert("please enter neccesary field and try again")</script>';
  } elseif ($action == "deleteRow") {
    if($_REQUEST['emp_no'])
      $answer = " <div class='container'>
                    <center>
                    <div class='col-sm-7 alert alert-danger' role='alert'>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                      </button>
                      " . $ctrl->{$action}($_REQUEST) . "
                    </div> 
                    </center>
                  </div>";
    else
      echo '<script>alert("please enter number and try again")</script>';
  }
?>