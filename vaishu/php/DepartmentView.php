<?php
  require_once 'Config.php';
  $_POST['View'] = 'Department';
  include_once 'AutoLoader.php';

  if($_POST['submit'] == 'add') {
    print_r($result);
  } 
  if($_POST['submit'] == 'update') {
    print_r($result);
  } 
  if($_POST['submit'] == 'delete') {
    print_r($result);
  } 
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
            } echo "</table>";     
  } 

?>

<html>
  <body>
    <form  method = "post">
      deptno: <input type = "text" name = "dept_no"><BR>
      empno: <input type = "text" name = "emp_no"><BR>
      deptname: <input type = "text" name = "dept_name"><BR>
      <input type = "submit" name = "submit" value = "getAll">
      <input type = "submit" name = "submit" value = "add">
      <input type = "submit" name = "submit" value = "update">
      <input type = "submit" name = "submit" value = "delete">
    </form>
  </body>
</html> 
