<!DOCTYPE html>
<html>
  <head>
    <title>DEPARTMENT</title>
  </head>
  <body>
    <form method = "POST">
      <h2>DEPARTMENT INFORMATION</h2>
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
            <label> Department No . : </label>
            <input type = "text" name = "deptno">
          </div>
        <div>
        <br><br>
        <div>
          <div>
            <label> Department Name : </label>
            <input type = "text" name = "deptname">
          </div>
        </div>
        <br><br>
      </center>
    </form>
  </body>
</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
$_POST['view'] = "DepartmentController"; 
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
          <tr><th> Department NO </th>
          <th> Department Name </th></tr>";
    foreach ($result AS $row) {            
      echo "<tr>
          <td>" . $row['dept_no'] . "</td>
          <td>" . $row['dept_name'] . "</td>
          </tr>"; 
    } echo "</table>";        
  }
}
?>