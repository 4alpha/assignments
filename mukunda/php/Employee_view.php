<!DOCTYPE html>
<html>
  <head>
    <h1 id="header"> Employee </h1>
    <style>
      .body {
        background-color:skyblue;
      }
      #header {
        margin-left:680px;
      }
      .div {
        height:50px;
      }
      .leftdiv {
        float:left; 
        width:50%;
      }
      .rightdiv {
        float:right; 
        width:50%;
      }
      .label {
        margin-left:600px;
      }
      .button {
        margin-left:530px;
      }
    </style>
  </head>
  <body class="body">
    <form method="POST">
      <div class="div">
        <div class="leftdiv">
          <label class="label"> Id-no: </label>   
        </div>
        <div class="rightdiv">
          <input type="number" name="emp_no" id="emp_no" >    
        </div>
      </div>
      <div class="div">
        <div class="leftdiv">
          <label class="label"> Name: </label>    
        </div>
        <div class="rightdiv">
          <input type="text" name="name" id="emp_name" >
        </div>
      </div>
      <div class="div">
        <div class="leftdiv">
          <label class="label"> Gender: </label>    
        </div>
        <div class="rightdiv">
          <input type="text" name="gender" id="gender" >
        </div>
      </div>
      <div class="button">
        <input type="submit" name="operation" value="add">
        <input type="submit" name="operation" value="getRow">
        <input type="submit" name="operation" value="update">
        <input type="submit" name="operation" value="delete">
        <input type="submit" name="operation" value="getAll">
      </div>
    </form>
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
        echo "<br><div style=margin-left:680px>" . "Data is not inserted" . "</div>";
      } else {
          echo "<br><div style=margin-left:680px>" . "Data is inserted successfully" . "</div>";
        }
    } elseif($_POST['operation'] == 'getRow') {
        if($result == 0){
          echo $result;
        } else {
            displayGetRow($result);
          }  
      } elseif($_POST['operation'] == 'update') {
          echo $result;
      } elseif($_POST['operation'] == 'delete') {
          echo $result;
      } elseif($_POST['operation'] == 'getAll') {
          displayAll($result); 
      }     
  }   
?>


