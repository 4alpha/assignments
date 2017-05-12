<?php
  require_once 'Config.php';
  $_POST['View'] = 'Department';
  include_once 'AutoLoader.php';

  if (isset($_POST['submit'])) {
    if($_POST['submit'] == 'getAll') {
      echo "<table border = 1>
            <tr><th>Department NO</th>
            <th>Departmemnt Name </th>
            <th> can have multiple department</th>
            </tr>";
        foreach($result AS $row) {            
          echo "<tr>
                <td>".$row['dept_no']."</td>
                <td>".$row['dept_name']."</td>
                <td>".$row['can_have_multiple_department']."</td>
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
      deprtment Number: <input type="text" name="dept_no"><BR>
      deprtment Name: <input type = "text" name = "dept_name"><BR>
      Can_have_multiple_department: <input type = "text" name = "can_have_multiple_department"><BR>
      <input type="submit" name="submit" value="getAll">
      <input type="submit" name="submit" value="add">
      <input type="submit" name="submit" value="update">
      <input type="submit" name="submit" value="delete">
    </form>
  </body>
</html> 
