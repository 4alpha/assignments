<!DOCTYPE html>
<html>
  <head>
    <title>EMPLOYEE</title>
  </head>
  <body>
    <form method = "POST">
      <h2>EMPLOYEE INFORMATION</h2>
      <center>
      <div>
        <input type = "submit" value = "add" name = "submit" style = "width:120px; height:40px">
        <input type = "submit" value = "update" name = "submit" style = "width:120px; height:40px">
        <input type = "submit" value = "delete" name = "submit" style = "width:120px; height:40px">
        <input type = "submit" value = "getrow" name = "submit" style = "width:120px; height:40px">
      </div>
      <br><br>
      <div>
        <div>
          <label> Employee No. :</label>
          <input type = "text" name = "empno"><br><br>
        </div>
        <div>
          <label> Employee FirstName :</label>
          <input type = "text" name = "fname"><br><br>
        </div>
        <div>
          <label> Employee LastName : </label>
          <input type = "text" name = "lname"><br><br>
        </div>
        <div>
          <label> Employee BirthDate :</label>
          <input type = "date" name = "bdate"><br><br>
        </div>
        <div>
          <label> Emlpoyee Gender : </label>
          <input type = "text" name = "gender"><br><br>
        </div>
        <div>
          <label> Employee Hiredate : </label>
          <input type = "text" name = "hiredate"><br><br>
        </div>
      </div>
      </center>
    </form>
  </body>
</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
$_POST['view'] = "EmployeeController"; 
include_once 'autoLoader.php';
if (isset($_POST['submit'])) {
  if ($_POST['submit'] == 'add') {
    print_r($result);
  }

  if ($_POST['submit'] == 'update') {
    print_r($result);
  }

  if ($_POST['submit'] == 'delete') {
    print_r($result);
  }
  
  if ($_POST['submit'] == 'getrow') {
    echo "<table border = 1>
          <tr><th> Employee NO </th>
          <th> First Name </th>
          <th> Last Name </th>
          <th> Birth Date </th>
          <th> Gender </th>
          <th> Hire Date </th></tr>";
    foreach ($result AS $row) {            
      echo "<tr><td>" . $row['emp_no'] . "</td>
            <td>" . $row['first_name'] . "</td>
            <td>" . $row['last_name'] . "</td>
            <td>" . $row['birth_date'] . "</td>
            <td>" . $row['gender'] . "</td>
            <td>" . $row['hire_date'] . "</td></tr>"; 
    } echo "</table>";  
  }
}
?>