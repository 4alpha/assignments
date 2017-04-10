<!DOCTYPE html>
<html>
  <body>
    <form method="POST">
      <div>
        <label>Department-no:</label>   
        <input type="number" name="d_no" id="d_no" >    
      </div>
      </div>
      <div>
        <label>Department Name:</label>   
        <input type="text" name="d_name" id="d__name" > 
      </div>
      <div>
        <label>Can have multiple column:</label>    
        <input type="text" name="multiple_departments" id="multiple_departments" >
      </div>
      <div>
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

  $_POST['View']= "Department";

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
            displayDepartment($result);
        }  
    } elseif($_POST['operation'] == 'getAll') {
        displayDepartment($result); 
    } else {
        echo $result;
    }
  }   
?>


