<?php 
  include_once 'Controller.php'; 
  $_POST['view'] = "Employee";
?>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="container text-xs-center">
      <div class="container text-xs-center ">
        <div style="display : none;" class="container form-group" id="employeeForm">
          <div class="col row justify-content-md-center">
            <form method="post" name="employeeform" action="employeeView.php" onsubmit="return validateForm(this.form)">  
              <fieldset class="form-group">
                <legend> Employee Information </legend>
                <div class="form-group">
                  <label> Employee no :
                  <input class="form-control input-sm"  type="number" name="emp_no" id="emp_no" min="0"/> 
                </div>
                <div class="form-group">
                  <label> first name :
                  <input class="form-control input-sm" type="text" name="firstName" id="firstName" /> 
                </div>
                <div class="form-group">
                  <label> last name :
                  <input class="form-control input-sm" type="text" name="lastName" id="lastName" /> 
                </div>
                <div class="form-group">
                  <label> hire date :
                  <input class="form-control input-sm" type="date" name="hireDate" id="hireDate" /> 
                </div>
                <div class="form-group">
                  <label> Select department :
                  <?php getDepartment(); ?>
                </div>
                <div class="form-group input-sm" id="addBtnDiv">
                  <button type="submit" class="btn btn-primary btn-sm" name="submit" value="addRow">
                    <i class="icon-user icon-white"></i> Add
                  </button>
                  <button type="button" class="btn btn-warning btn-sm" onclick="show()" > Cancel
                  </button>
                </div>
                <div class="form-group input-sm" id="updateBtnDiv">
                  <button type="submit" class="btn btn-primary btn-sm" name="submit" value="updateRow" >
                    <i class="icon-user icon-white"></i> Update
                  </button>
                  <button type="button" class="btn btn-warning btn-sm" onclick="show()"> Cancel
                  </button>
                </div>
              </fieldset>
            </form>
          </div>
        </div>

        <div class="container offset-8">
          <div class="ml-sm-5 mt-5 mb-2" id="addbtn">
            <button type="submit" class="btn btn-primary btn-sm" onclick="showForm(this.id)" id="addButton">
              Add <i class="fa fa-user-plus"></i>
            </button>
          </div>
        </div>
      </div>

      <?php       

        function getDepartment() {
          new Services\DepartmentService();
          $select= '<select multiple="multiple" id="selectDept" name="departments[]" class="form-control input-sm" required>';
          foreach($GLOBALS["departments"] as $rs) {
            $select .= '<li><option value="' . $rs['dept_no'] . '">' . $rs['dept_name'] . '</option></li>';
          }
          $select .= '</select>';
          echo $select;
        }

        echo $answer;
        $result = $ctrl->getRow();
        echo "<div class='container text-xs-center' id='empTable'>
                <center>
                  <div class='text-sm '>
                    <table class='table table-lg table-responsive table-hover table-bordered list'>
                      <thead>
                        <tr>
                          <th> Employee no </th>
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
                    <div class='form-group input-sm'>
                      <a href='?submit=updatRow&no=$row[emp_no]' type='button' class='mb-1 mt-1 btn btn-primary btn-sm' onclick='return showForm(".$row[emp_no].", \"".$row[first_name]."\", \"".$row[last_name]."\", \"".$row[hire_date]."\")' id='updateButton'> 
                        Edit <i class='fa fa-edit'></i>
                      </a>
                      <a href='?submit=deleteRow&emp_no=$row[emp_no]' type='submit' name='submit' value='deleteRow' class='mb-1 mt-1 btn btn-danger btn-sm' >
                        Delete <i class='fa fa-trash-o'></i>
                      </a>
                    </div>
                  </td>
                </tr>"; 
        } 
        echo "        </tbody>
                    </table>
                  </div>
                </center>
              </div>";
      ?>

    </div>
  </body>
</html>
