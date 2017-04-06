<!DOCTYPE html>
<html lang="en">
  <head>
    <title> ClassDemo </title>
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
  </head>
  <body ng-app="BlankApp" ng-cloak>
    <div>
      <h1 class="h1"> 
        <center> Handling database using class </center>
      </h1>
    </div>
    <form method="POST">
      <input type="hidden" name="filename" value="Employee_view.php" /> 
      <fieldset style="align-self: center;"> 
        <legend style="text-align: center;"> 
          Employee Information 
        </legend>
        <div> 
          <center>
            <div>
              <md-input-container flex>
                <label>Employee no</label>
                <input type="number"/>
              </md-input-container>
            </div>
            <div>
              <md-input-container flex>
                <label>First Name</label>
                <input type="text"/>
              </md-input-container>
            </div>
            <div>
              <md-input-container flex>
                <label>Last Name</label>
                <input type="text"/>
              </md-input-container>
            </div>
            <div>
              <md-input-container flex>
                <label>Hire Date</label>
                <input type="date"/>
              </md-input-container>
            </div>
            <section layout="row" layout-sm="column" layout-align="center center" layout-wrap>
              <md-button type="submit" value="getRow" name="submit" class="md-raised md-primary">Get All Records</md-button>
              <md-button class="md-raised md-primary">Add</md-button>
              <md-button class="md-raised md-primary">Update</md-button>
              <md-button class="md-raised md-warn">Delete</md-button>
            </section>
          </div>
        </fieldset>
      </form>
      <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>

      <!-- Angular Material Library -->
      <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
      
      <!-- Your application bootstrap  -->
      <script type="text/javascript">    
        /**
         * You must include the dependency on 'ngMaterial' 
         */
        angular.module('BlankApp', ['ngMaterial']);
      </script>
    </center>
  </body>  
  <script src="validations.js" >   
  </script>
</html>

<?php 
  include_once 'Controller.php';
  
  if (isset($_POST['submit'])) {
    if ($_POST['submit'] == 'getRow') {
      echo "<table border = 1>
            <tr><th> Employee NO </th>
            <th> First Name </th>
            <th> Last Name </th>
            <th> Hire Date </th></tr>";
      foreach ($result AS $row) {            
        echo "<tr><td>" . $row['emp_no'] . "</td>
              <td>" . $row['first_name'] . "</td>
              <td>" . $row['last_name'] . "</td>
              <td>" . $row['hire_date'] . "</td></tr>"; 
      } 
      echo "</table>";  
    } else {
      echo $result;
    }
  }

?>