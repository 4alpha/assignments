<!DOCTYPE html>
<html lang="en">
  <head>
    <title>EMPLOYEE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
  </head>
  <body ng-app="BlankApp" ng-cloak>
    <form method="POST">
      <div layout="column">
        <h2>EMPLOYEE INFORMATION</h2>
      </div>
      <center>
        <div>
          <md-button class="md-fab" type="submit" value="add" name="submit" style="width:70px;height:70px">
            add
          </md-button>
          <md-button class="md-fab md-primary" type="submit" value="update" name="submit" style="width:70px;height:70px">
            update
          </md-button>
          <md-button class="md-fab" type="submit" value="delete" name="submit" style="width:70px;height:70px">
            delete
          </md-button>
          <md-button class="md-fab md-primary" type="submit" value="getrow" name="submit" style="width:70px;height:70px">
            getAll
          </md-button>
        </div>
        <div>
          <md-input-container flex>
            <label>Employee Number :</label>
            <input type="text" name="empno"/>
          </md-input-container>
        </div>
        <div>
          <md-input-container flex>
            <label> Employee FirstName :</label>
            <input type="text" name="fname">
          </md-input-container>
        </div>
        <div>
          <md-input-container flex>
            <label> Employee LastName : </label>
            <input type="text" name="lname">
          </md-input-container>
        </div>
        <div>
          <md-input-container flex>
            <label> Employee BirthDate :</label>
            <input type="date" name="bdate">
          </md-input-container>
        </div>
        <div>  
          <md-input-container flex>
            <label> Emlpoyee Gender : </label>
            <input type="text" name="gender">
          </md-input-container>
        </div>
        
      </center>
    </form>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
  <script type="text/javascript">    
    angular.module('BlankApp', ['ngMaterial']);
  </script>
  </body>
</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
$_POST['view'] = "EmployeeController"; 
include_once 'common.php';
if (isset($_POST['submit'])) {
  if ($_POST['submit'] == 'getrow') {
    echo "<table border = 1>
          <tr><th> Employee NO </th>
          <th> First Name </th>
          <th> Last Name </th>
          <th> Birth Date </th>
          <th> Gender </th></tr>";
    foreach ($result AS $row) {            
      echo "<tr><td>" . $row['emp_no'] . "</td>
            <td>" . $row['first_name'] . "</td>
            <td>" . $row['last_name'] . "</td>
            <td>" . $row['birth_date'] . "</td>
            <td>" . $row['gender'] . "</td></tr>"; 
    } 
    echo "</table>";  
  } else {
    echo $result;
  }
}
?>