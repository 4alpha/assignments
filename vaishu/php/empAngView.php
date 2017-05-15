<?php
  require_once 'Config.php';
  $_POST['View'] = 'Employee';
  include_once 'AutoLoader.php';
  
  if (isset($_POST['submit'])) {
    if($_POST['submit'] == 'getAll') {
      echo "<table border = 1>
            <tr><th>EMP NO</th>
            <th>EMP NAME</th>
            </tr>";
        foreach($result AS $row) {            
          echo "<tr>
                <td>".$row['emp_no']."</td>
                <td>".$row['emp_name']."</td>
                <tr>";
        } 
      echo "</table>"; 
    } else {
      echo $result;
    }     
  } 

?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Angular Material style sheet -->
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
  </head>
   <body ng-app="BlankApp" ng-cloak>

    
    
    <form method="post">
      <md-input-container class="md-block" flex="50">
          <label>Employee Number</label>
          <md-icon md-svg-src="personName.svg" class="name"></md-icon>
          <input  required name="no" ng-model="user.no" />
          <div ng-messages="userForm.no.$error" ng-if="!showHints">
          <div ng-message="required"></div>
          </div>
      </md-input-container>
     <md-input-container class="md-block" flex="50">
          <label>Employee Name</label>
           <md-icon md-svg-src="personName.svg" class="name"></md-icon>
          <input  required name="name" ng-model="user.name" />
          <div ng-messages="userForm.name.$error" ng-if="!showHints">
          <div ng-message="required"></div>
          </div>
      </md-input-container>
      
      
      <md-button class="md-fab md-mini md-primary" aria-label="Use Android">
          <md-icon md-svg-src="getdata.svg" style="color: greenyellow;"></md-icon>
      </md-button>
      <md-button class="md-fab md-mini md-primary" type="submit" name="submit" value="add" aria-label="Use Android">
          <md-icon md-svg-src="addData.svg" style="color: greenyellow;"></md-icon>
      </md-button>
      <md-button class="md-fab md-mini md-primary" type="submit" name="submit" value="update" aria-label="Use Android">
          <md-icon md-svg-src="updateData.svg" style="color: greenyellow;"></md-icon>
      </md-button>
      <md-button class="md-fab md-mini md-primary" type="submit" name="submit" value="delete" aria-label="Use Android">
          <md-icon md-svg-src="deleteData.svg" style="color: greenyellow;"></md-icon>
      </md-button>
      
      <!--<inpu>
      <input type="submit" name="submit" value="add">
      <input type="submit" name="submit" value="update">
      <input type="submit" name="submit" value="delete">-->
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