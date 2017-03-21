<?php
  require_once 'Config.php';
  $_POST['View'] = 'Department';
  include_once 'AutoLoader.php';

  if (isset($_POST['submit'])) {
    if($_POST['submit'] == 'getAll') {
      echo "<table border = 1>
            <tr><th>Department NO</th>
            <th>Employee NO </th>
            <th>Departmemnt Name </th>
            </tr>";
        foreach($result AS $row) {            
          echo "<tr>
                <td>".$row['dept_no']."</td>
                <td>".$row['emp_no']."</td>
                <td>".$row['dept_name']."</td>
                <tr>";
        } 
      echo "</table>"; 
    } else {
      echo $result;
    }     
  } 

?>

<html>
  <body>
    <form  method="post">
      deptno: <input type="text" name="dept_no"><BR>
      empno: <input type="text" name="emp_no"><BR>
      deptname: <input type = "text" name = "dept_name"><BR>
      <input type="submit" name="submit" value="getAll">
      <input type="submit" name="submit" value="add">
      <input type="submit" name="submit" value="update">
      <input type="submit" name="submit" value="delete">
    </form>
  </body>
</html> 
