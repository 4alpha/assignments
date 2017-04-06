<!DOCTYPE html>
<html>
  <head>
    <title>DEPARTMENT OPERATION</title>
  </head>
  <body>
    <form method="POST">
      <h2>DEPARTMENT INFORMATION</h2>
      <center>
        Department No. :<input type="text" name="dept_no"><br><br>
        Department Name :<input type="text" name="dept_name"><br><br>
        Can have multiple departments : 
        <input type="radio" name="multi_dept" value="true" /> Yes
        <input type="radio" name="multi_dept" value="false" /> No
        <br><br>
        <input type="submit" name="submit" value="getRow" />
        <input type="submit" name="submit" value="addRow" />
        <input type="submit" name="submit" value="updateRow" />
        <input type="submit" name="submit" value="deleteRow" />
      </center>
    </form>
  </body>
</html>

<?php
  $_POST['view'] = "Department"; 
  include_once 'Controller.php';
  
  if (isset($_POST['submit'])) {
    if ($_POST['submit'] == 'getRow') {
      echo "<table border = 1>
            <tr>
              <th> Department No </th>
              <th> Department Name </th>
              <th> Multiple departments </th>
            </tr>";
      foreach ($result AS $row) {            
        echo "<tr><td>" . $row['dept_no'] . "</td>
              <td>" . $row['dept_name'] . "</td>
              <td> " . $row['multi_dept'] . "</td>
              </tr>"; 
      } 
      echo "</table>";  
    } else {
      echo $result;
    }
  }
?>
