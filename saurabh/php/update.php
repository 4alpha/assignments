<?php
 
 $dbcon = pg_connect("host = localhost dbname = employees user = postgres password = psql") 
 or die('could not connect');
 if(isset($_POST['submit'])) {
   $empno = (int)$_POST['emp_no'];
   $first = (string)$_POST['firstName'];
   $last = (string)$_POST['lastName'];
   $result = pg_query("update employees set first_name='$_POST[firstName]', last_name='$_POST[lastName]' where emp_ni = '$empno';");
   if (pg_last_error($dbcon)) {
     echo 'not updated successfully ';
     echo pg_errormessage($dbcon);
   } else {
     echo 'updated successfully';
   }
 }
 $query = 'SELECT * FROM employees';
  $result = pg_query($query) or die('Query failed: ' . pg_last_error());
  echo "<table>\n";
  while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
      echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
  }
  echo "</table>\n";
 console.log("yes");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>
      UpdateEmployeeRecord
    </title
  </head>
  <body style = "text-align: center">
    <h1>
      Update Employee's Information
    </h1>
    <form action = "update.php" method= "post">
      <div style = "text-align : center">
        Enter emp_no : 
        <input type = "number" name = "emp_no"><br><br>
        Enter first name :
        <input type = "text" name = "firstName"><br><br>
        Eneter last name : 
        <input type = "text" name = "lastName"><br><br>
        <input type = "submit" name = "submit" value = "update">
      </div>
    </form>
  </body>
</html>