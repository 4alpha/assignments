<!DOCTYPE html>
<html>
  <head>
    <title>
      AcceptEmployeeInfo
    </title
  </head>
  <body style = "text-align: center">
    <h1>
      Enter Employee's Information
    </h1>
    <form action = "accept.php" method= "get">
      <div style = "text-align : center">
        Enter emp_no : 
        <input type = "number" name = "emp_no"><br><br>
        Enter first name : 
        <input type = "text" name = "firstName"><br><br>
        Enter last name : 
        <input type = "text" name = "lastName"><br><br>
        Hire Date :
        <input type = "date" name = "hireDate"> <br><br>
        <input type = "submit" name = "submit" value = "submit">
      </div>
    </form>
  </body>
</html>

<?php
 
 $dbcon = pg_connect("host = localhost dbname = employees user = postgres password = psql") 
 or die('could not connect');
 $result = pg_query("insert into employees values('$_POST[emp_no]','$_POST[firstName]','$_POST[lastName]','$_POST[hireDate]');");
 if (pg_last_error($dbcon)) {
    echo 'inserted successfully ';
 } else {
   echo 'not inserted successfully';
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
 //print_r($_REQUEST);
 echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
?>