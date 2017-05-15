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
  <body>
    <form action="">
      empno: <input type="text" name="emp_no"><BR>
      empname: <input type="text" name="emp_name"><BR>
      <input type="submit" name="submit" value="getAll">
      <input type="submit" name="submit" value="add">
      <input type="submit" name="submit" value="update">
      <input type="submit" name="submit" value="delete">
    </form>
  </body>
</html> 
