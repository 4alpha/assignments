<!DOCTYPE html>
<html lang="en">
  <head>
    <h1 class="md-display-6">Employee Details</h1>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.css">
 
  </head>
  <body ng-app="BlankApp" ng-cloak>
  
    <form method="POST">
      <div>
        <md-input-container flex>
          <label>Id: </label>
          <input type="text"/>
        </md-input-container>
      </div>
     <div>
       <md-input-container flex>
        <label>Name:</label>   
        <input type="text" name="name" id="emp_name" > 
        </md-input-container> 
    </div>
    <div>
       <md-input-container flex>
        <label>Gender:</label>    
        <input type="text" name="gender" id="gender" >
        </md-input-container>
     </div>
   
      <div>
       <md-button class="md-fab  md-primary md-hue-2" type="submit" name="operation" value="add">Add</md-button>
       <md-button class="md-raised  md-primary md-hue-2" type="submit" name="operation" value="add">getRow</md-button>
       <md-button class="md-raised  md-primary md-hue-2" type="submit" name="operation" value="add">Update</md-button>
       <md-button class="md-raised  md-warn md-hue-2" type="submit" name="operation" value="add">delete</md-button>
       <md-button class="md-raised  md-primary md-hue-2" type="submit" name="operation" value="add">getAll</md-button>
      </div>
     
    </form>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-animate.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-aria.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.5/angular-messages.min.js"></script>
     <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.1.0/angular-material.min.js"></script>
  
  <!-- Your application bootstrap  -->
  <script type="text/javascript">    
    /**
     * You must include the dependency on 'ngMaterial' 
     */
    angular.module('BlankApp', ['ngMaterial']);
  </script>
  </body>
</html>



<?php
  error_reporting('E_ALL');
  ini_set("display_errors",1);

  $_POST['View']= "Employee";

  include 'common.php';
  if(isset($_POST['operation'])) {
    if($_POST['operation'] == 'add') {
      if(!$result) {
        echo "Data is not inserted";
      } else {
          echo "Data is inserted successfully";
      }
    } elseif($_POST['operation'] == 'getRow') {
        if($result == 0){
          echo $result;
        } else {
            display($result);
        }  
    } elseif($_POST['operation'] == 'getAll') {
        display($result); 
    } else {
        echo $result;
    }
  }   
?>


