<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Department</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="Validation.js"></script>
  </head>
  <body>
  <div class="container" style="display:none" id="addform" style="margin-top:50px">
    <form method="POST">
      <div class="col-12 col-md-auto">
        <h3> ADD DEPARTMENT INFORMATION</h3>
      </div>
      <div style="border:1px solid #cecece;">
        <div class="row justify-content-between" style="margin-top:50px">
          <div class="col text-right">
            <label> Department Number :</label>
          </div>
          <div class="col col-md-8">
            <input type="text" name="deptno">
          </div>
        </div>
        <div class="row justify-content-around">
          <div class="col text-right" style="margin-top:20px">
            <label> Department Name :</label>
          </div>
          <div class="col col-md-8" style="margin-top:20px">
            <input type="text" name="deptname">
          </div>
        </div>
        <div class="row justify-content-md-center">
          <div class="row" style="margin-top:20px">
            <button type="submit" name="submit" value="add" class="btn btn-success btn-sm" style="margin-right:5px"><i class="fa fa-plus" aria-hidden="true"></i>Add</button>
            <button type="button" class="btn btn-info btn-sm" style="margin-left:5px" onclick="tableFormDisplay()"><i class="fa fa-times" aria-hidden="true"></i>Cancel</button>
          </div>
        </div>
      </div>
    </form>
  </div>
    <div class="container" style="display:none" id="updateform" style="margin-top:50px">
      <form method="POST">
      <div class="col-12 col-md-auto">
        <h3> UPDATE DEPARTMENT INFORMATION</h3>
      </div>
      <div style="border:1px solid #cecece;">
      <div class="row justify-content-between" style="margin-top:50px">
        <div class="col text-right">
          <label> Department Number :</label>
        </div>
        <div class="col col-md-8">
          <input type="text" name="deptno" id="dno">
        </div>
      </div>
      <div class="row justify-content-around">
        <div class="col text-right" style="margin-top:20px">
          <label> Department Name :</label>
        </div>
        <div class="col col-md-8" style="margin-top:20px">
          <input type="text" name="deptname" id="dname">
        </div>
      </div>
      <div class="row justify-content-md-center">
        <div class="row" style="margin-top:20px">
        <button type="submit" name="submit" value="update" class="btn btn-success btn-sm" style="margin-right:5px"><i class="fa fa-pencil" aria-hidden="true"></i>
 Update</button>
        <button type="button" class="btn btn-info btn-sm" style="margin-left:5px" onclick="tableFormDisplay()"><i class="fa fa-times" aria-hidden="true"></i>
 Cancel</button>
        </div>
      </div>
      </div>
    </form>
    </div>
      <div class="container" id="tablegetall" >
        <form method="POST">
        <div class="row justify-content-md-center">
          <h3>DEPARTMENT INFORMATION</h3>
        </div>
        <div class="form group">
          <button type="button" class="btn btn-success btn-md" onclick="addFormDisplay()"><i class="fa fa-plus" aria-hidden="true"></i>  Add New</button>
        </div>
      </form>
      </div>
      <div class="modal fade" id="dialogConfirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Do you want to delete this Department ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" value="delete" class="btn btn-primary">Delete</button>
            </div>
          </div>
        </div>
      </div>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  </body>
</html>

<?php
// error_reporting(E_ALL);
// ini_set('display_errors',1);
$_POST['view'] = "DepartmentController"; 
include_once 'common.php';
if($_POST['submit'] == 'add') {
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <button type=button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
          " . $result ."</div>";
} elseif ($_POST['submit'] == 'update') {
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <button type=button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
          " . $result ."</div>";
} elseif ($_POST['submit'] == 'delete') {
    echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
          <button type=button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
          </button>
          " . $result ."</div>";
}           
$result = $obj->getrow($_REQUEST);
  echo "<form method='POST'><div class='container' id='record'>
        <table class='table table-bordered table-inverse'>
        <thread class='thead-inverse'>
        <tr><th> DEPARTMENT NO. </th>
        <th> DEPARTMENT NAME </th>
        <th> ACTION </th></tr></thread></div>";
  foreach ($result AS $row) {            
    echo "<tbody><tr>
        <td>" . $row['dept_no'] . "</td>
        <td>" . $row['dept_name'] . "</td>
        <td>
        <a href='/departmentView.php?&dept_no=$row[dept_no]' type='button' class='btn btn-warning btn-sm' style='margin-right:70px' onclick='return updateFormDisplay($row[dept_no])'><i class='fa fa-pencil' aria-hidden='true'></i>
Update</a>
        <a href='?submit=delete&dept_no=$row[dept_no]' type='button' class='btn btn-secondary btn-sm' data-toggle='modal' data-target='#dialogConfirmation'><i class='fa fa-trash' aria-hidden='true'></i>
DELETE</a></td>
        </tr>"; 
  } 
  echo "</tbody></table></form>";
?>