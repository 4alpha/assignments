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
  <div class="container ml-3" style="display:none" id="addform" >
    <div class="col row justify-content-md-center">
      <h2> DEPARTMENT INFORMATION </h2>
    </div>
    <form method="POST">
      <div class="form-group">
        <label for="dno" hidden>Department Number:</label>
        <input class="form-control" type="number" name="deptno" id="dno" placeholder="--">
      </div>
      <div class="form-group">
        <label for="dname">Department Name:</label>
        <input class="form-control" type="text" id="deptnameadd" name="deptname" placeholder="department name">
      </div>
      <div class="form-group">
        <label for="status">Assign Status:</label>
          <input class="radio-inline ml-4" id="statustrue" type="radio" name="status" value="t"> YES
          <input class="radio-inline ml-4" id="statusfalse" type="radio" name="status" value="f"> NO
      </div>
      <div class="form-group" align="center" id="addBtnDiv">
        <div class="col">
          <button type="submit" id="addbtn" name="submit" value="add" class="btn btn-success btn-md mr-3" onclick="return validateForm(this.form)">Add</button>
          <button type="button" class="btn btn-info btn-md" onclick="deptFormDisplay()">Cancel</button>
        </div>
      </div>
      <div class="form-group" align="center" id="updateBtnDiv">
        <div class="col">
          <button type="submit" id="updatebtn" name="submit" value="update" class="btn btn-success btn-md  mr-3" onclick="return validateForm(this.form)">Update</button>
          <button type="button" class="btn btn-info btn-md" onclick="deptFormDisplay()">Cancel</button>
        </div>
      </div>
    </form>
  </div>
  <div class="container" id="tablegetall">
    <form method="POST">
      <div class="form-group">
          <h2><b><u> DEPARTMENT INFORMATION </u></b></h2>
      </div>
      <div class="form-group">
        <button type="button" id="addnew" class="btn btn-primary btn-sm" onclick="return deptaddFormDisplay(this.id)"><i class="fa fa-plus" aria-hidden="true"></i>  Add New</button>
      </div>
    </form>
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
if (isset($_REQUEST['submit'])) {
  if ($_REQUEST['submit'] == 'add') {
      echo "<div class='container col-md-5 alert alert-info alert-dismissible fade show' role='alert'>
            <button type=button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            " . $result ."</div>";
  } 
  if ($_REQUEST['submit'] == 'update') {
      echo "<div class='container col-md-5 alert alert-info alert-dismissible fade show' role='alert'>
            <button type=button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            " . $result ."</div>";
  }
  if ($_REQUEST['submit'] == 'delete') {
      echo "<div class='container col-md-5 alert alert-info alert-dismissible fade show' role='alert'>
            <button type=button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            " . $result ."</div>";
  }
}          
$result = $obj->getrow($_REQUEST);
  echo "<form method='POST'><div class='container offset-3' id='record'>
        <table class='table table-responsive table-bordered table-hover '>
        <thead>
        <tr><th> DEPARTMENT NO. </th>
        <th> DEPARTMENT NAME </th>
        <th> ASSIGN STATUS </th>
        <th> ACTION </th></tr></thead>";
  foreach ($result AS $row) {            
    echo "<tbody><tr>
        <td>" . $row['dept_no'] . "</td>
        <td>" . $row['dept_name'] . "</td>
        <td>" . $row['assign_status'] . "</td>
        <td>
        <a href='?submit=update&dept_no=$row[dept_no]&dept_name=$row[dept_name]&assign_status=$row[assign_status]' type='button' class='btn btn-primary btn-sm' style='margin-right:70px' onclick='return deptaddFormDisplay(" . $row[dept_no] . ", \"" . $row[dept_name] . "\", \"" . $row[assign_status]."\")'><i class='fa fa-pencil' aria-hidden='true'></i>
Update</a>
        <a href='?submit=delete&dept_no=$row[dept_no]' type='button' class='btn btn-danger btn-sm' name='submit' value='delete'><i class='fa fa-trash' aria-hidden='true'></i>
Delete</a></td></tr>"; 
  } 
  echo "</tbody></table></div></form>";
?>