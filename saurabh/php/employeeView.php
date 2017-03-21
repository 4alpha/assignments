<!DOCTYPE html>
<html>
  <head>
    <title> ClassDemo </title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body >
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
          <div class="wrapper">
            <div class="leftClass left"> 
              emp no :  
            </div>
            <div class="rightClass right"> 
              <input type='number' name='emp_no' />
            </div>
          </div>
          <div class="wrapper">
            <div class="leftClass left">
              first name : 
            </div>
            <div class="rightClass right">
              <input type='text' name='firstName'></input>
            </div>
          </div>
          <div class="wrapper">
            <div class="leftClass left">
              last name : 
            </div>
            <div class="rightClass right">
              <input type='text' name='lastName' />
            </div>
          </div>
          <div class="wrapper">
            <div class="leftClass left">
              hire date : 
            </div>
            <div class="rightClass right">
              <input type='date' name='hireDate' />
            </div>
          </div>
          <div class="center">
            <input type="submit" name="getRow" value="getRows()" />
            <input type="submit" name="addRow" value="addRow()" />
            <input type="submit" name="updateRow" value="updateRow()" />
            <input type="submit" name="deleteRow" value="deleteRow()" />
          </div>
        </div>
      </fieldset>
    </form>
  </body>  
</html>

<?php 
  include_once 'Controller.php';
  
  if(isset($_POST['getRow'])) {
    print_r($result);
  }

  if(isset($_POST['addRow'])) {
    echo $result;
  }

  if(isset($_POST['updateRow'])) {
    echo $result;
  }
  
  if(isset($_POST['deleteRow'])) {
    echo $result;
  }
  
?>