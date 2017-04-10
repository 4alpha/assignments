<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EMPLOYEE</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="Validation.js"></script>
  </head>
  <body>
    <div class="container ml-3" style="display:none" id="empform">
      <div class="col row justify-content-md-center">
        <h2> EMPLOYEE INFORMATION </h2>
      </div>
      <form method="POST">
        <div class="form-group">
          <label for="empno" hidden>Employee Number:</label>
          <input class="form-control" type="number" id="empno" name="empno" placeholder="---">
        </div>
        <div class="form-group">
          <label for="fname">Employee First Name:</label>
          <input class="form-control" type="text" id="fname" name="fname" placeholder="First Name">
        </div>
        <div class="form-group">
          <label for="lname">Employee Last Name:</label>
          <input class="form-control" type="text" id="lname" name="lname" placeholder="Last Name">
        </div>
        <div class="form-group">
          <label for="bdate">Employee Birth Name:</label>
          <input class="form-control" type="date" id="bdate" name="bdate" placeholder="YYYY-MM-DD">
        </div>
        <div class="form-group">
          <label for="gender"> Emlpoyee Gender : </label>
          <input class="radio-inline ml-4" id="m" type="radio" name="gender" value="Male"> Male
          <input class="radio-inline ml-4" id="f" type="radio" name="gender" value="Female"> Female
        </div>
        <div class="form-group">
            <label> Select Multiple Department :</label>
            <?php 
              $db = pg_connect("host = localhost dbname = testdb user = postgres password = psql");
              $sql = pg_query("SELECT * FROM departments");
              if (pg_num_rows($sql)) {
                  $select = '<select multiple name="departments[]" required>';
                  while ($rs = pg_fetch_array($sql)) {
                      $select.='<option value="' . $rs['dept_no'] . '">' . $rs['dept_name'] . '</option>';
                  }
              }
              $select.='</select>';
              print_r( $select); 
            ?>
        </div>
        <div class="form-group" align="center" id="addBtnDivEmp">
          <div class="col">
            <button type="submit" id="addbtn" name="submit" value="add" class="btn btn-success btn-md mr-3" onclick="return validateEmpForm(this.form)">Add</button>
            <button type="button" class="btn btn-info btn-md" onclick="empFormDisplay()">Cancel</button>
          </div>
        </div>
        <div class="form-group" align="center" id="updateBtnDivEmp">
          <div class="col">
            <button type="submit" id="updatebtn" name="submit" value="update" class="btn btn-success btn-md  mr-3" onclick="return validateEmpForm(this.form)">Update</button>
            <button type="button" class="btn btn-info btn-md" onclick="empFormDisplay()">Cancel</button>
          </div>
        </div>
      </form>
    </div>
    <div class="container" id="getDisplayAll">
      <form method="POST">
        <div class="form-group">
          <div class="h-100 d-inline-block" style="height:100px; width: 420px; background-color: #FBABAF">
            <h2><b><u> EMPLOYEE INFORMATION </u></b></h2>
          </div>
        </div>
        <div class="form-group">
          <button type="button" id="addnew" class="btn btn-primary btn-sm" onclick="return empaddFormDisplay(this.id)"><i class="fa fa-plus" aria-hidden="true"></i>  Add New </button>
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
$_POST['view'] = "EmployeeController"; 
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
echo "<form method='POST'><div class='container offset-3' id='emptable'>
      <table class='table table-responsive table-bordered table-hover'>
      <thead>
      <tr><th> EMPLOYEE NO. </th>
      <th> FIRST NAME </th>
      <th> LAST NAME </th>
      <th> BIRTH DATE </th>
      <th> GENDER </th>
      <th> ACTION </th></tr></thead>";
foreach ($result AS $row) {            
  echo "<tbody><tr><td><b>" . $row['emp_no'] . "</b></td>
        <td>" . $row['first_name'] . "</td>
        <td>" . $row['last_name'] . "</td>
        <td>" . $row['birth_date'] . "</td>
        <td>" . $row['gender'] . "</td>
        <td><a href='?submit=update&emp_no=$row[emp_no]&first_name=$row[first_name]&last_name=$row[last_name]&birth_date=$row[birth_date]&gender=$row[gender]' type='button' class='btn btn-primary btn-sm' 
        style='margin-right:70px' onclick='return empaddFormDisplay(".$row[emp_no].", \"".$row[first_name]."\", \"".$row[last_name]."\", \"".$row[birth_date]."\", \"".$row[gender]."\")'><i class='fa fa-pencil' aria-hidden='true'></i>
Update</a>
        <a href='?submit=delete&emp_no=$row[emp_no]' type='button' class='btn btn-danger btn-sm' name='submit' value='delete'><i class='fa fa-trash' aria-hidden='true'></i>
Delete</a></td></tr>";
} 
echo "</tbody></table></div></form>";  

?>