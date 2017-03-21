<!DOCTYPE html>
<html>
  <body>
    <form method="POST">
      <div>
          <label class="label"> Id-no: </label>   
          <input type="number" name="emp_no" id="emp_no" >    
      </div>
      </div>
      <div>
        <label class="label"> Name: </label>   
        <input type="text" name="name" id="emp_name" > 
      </div>
      <div>
        <label class="label"> Gender: </label>    
        <input type="text" name="gender" id="gender" >
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
          displayGetRow($result);
         }  
      } elseif($_POST['operation'] == 'getAll') {
          displayAll($result); 
      } else {
          echo $result;
      }
  }   
?>


