<!DOCTYPE html>
<html>
  <head>
    <title> ClassDemo </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">  </head>
    <script src="validations.js" ></script>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div style="display : none;" class="container-fluid form-group text : center" id="empAddForm">
      <div class="col row justify-content-md-center">
        <form method="post" action="employeeView.php">  
          <fieldset class="form-group">
            <legend> Employee Information </legend>
            <div class="form-group">
              <label > Employee no :
              <input class="form-control input-sm"  type="number" name="emp_no"> 
            </div>
            <div class="form-group">
              <label > first name :
              <input class="form-control input-sm" type="text" name="firstName"> 
            </div>
            <div class="form-group">
              <label > last name :
              <input class="form-control input-sm" type="text" name="lastName"> 
            </div>
            <div class="form-group">
              <label > hire date :
              <input class="form-control input-sm" type="date" name="hireDate"> 
            </div>
            <div class="form-group input-sm">
              <button type="submit" class="btn btn-primary" name="submit" value="addRow">
                <i class="icon-user icon-white"></i> Add
              </button>
              <button type="button" class="btn btn-warning"> Cancel
              </button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
    <div class="container mt-5 text-right ml-0" id="addbtn">
      <button type="submit" class="btn btn-primary btn-sm" onclick="showAdd()">
        Add <i class="fa fa-user-plus"></i>
      </button>
    </div>
    
    <div style="display : none" class="container-fluid form-group" id="empUpdateForm">
      <div class="col row justify-content-md-center">
        <form method="post" action="employeeView.php">   
          
          <fieldset class="form-group">
            <legend> Employee Information </legend>
            <div class="form-group">
              <label > Employee no :
              <input class="form-control input-sm"  type="number" name="emp_no" id="emp_no"> 
            </div>
            <div class="form-group">
              <label > first name :
              <input class="form-control input-sm" type="text" name="firstName" id="firstName"> 
            </div>
            <div class="form-group">
              <label > last name :
              <input class="form-control input-sm" type="text" name="lastName" id="lastName"> 
            </div>
            <div class="form-group">
              <label > hire date :
              <input class="form-control input-sm" type="date" name="hireDate" id="hireDate"> 
            </div>
            <div class="form-group input-sm">
              <button type="submit" class="btn btn-primary" name="submit" value="updateRow">
                <i class="icon-user icon-white"></i> Update
              </button>
              <button type="submit" class="btn btn-warning" onclick="show()"> Cancel
              </button>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </body>
</html>

<?php 
  include_once 'Controller.php';
  $_POST['view'] = "Employee";

  echo $answer;
  $result = $ctrl->getRow();
  echo "  <div class='container' id='empTable'>
            <table class='table table-hover list'>
              <thead>
                <tr>
                  <th> Employee NO </th>
                  <th> First Name </th>
                  <th> Last Name </th>
                  <th> Hire Date </th>
                  <th> Action </th>
                </tr>
              </thead>
            <tbody>";
      foreach ($result AS $row) {            
        echo "<tr>
                <td>" . $row['emp_no'] . "</td>
                <td>" . $row['first_name'] . "</td>
                <td>" . $row['last_name'] . "</td>
                <td>" . $row['hire_date'] . "</td>
                <td> 
                  <a href='?submit=updatRow&no=$row[emp_no]' type='button' class='btn btn-primary' onclick='return showUpdate($row[emp_no]) '> 
                    Edit <i class='fa fa-edit'></i>
                  </a>
                  <a href='?submit=deleteRow&emp_no=$row[emp_no]' type='submit' name='submit' value='deleteRow' class='btn btn-danger' >
                    Delete <i class='fa fa-trash-o'></i>
                  </a>
                </td>
              </tr>"; 
      } 
      echo "    </tbody>
              </table>
            </div>";
?>

<!--type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"
<div class='modal fade' id='myModal' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Update Employee Information</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        The employee information will be update. Do you want to update?
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button >Save changes</button>
      </div>
    </div>
  </div>
</div>-->