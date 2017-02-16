<!DOCTYPE html>
<html>
  <body>
    <form method="POST" action="insert.php">
    <h2>Insert Record into Employees table</h2>
    Employee Number :<input type="text" name="no"><br>
    Employee FIrst Name :<input type="text" name="fname"><br>
    Employee Last Name :<input type="text" name="lname"><br>
    Employee Birth Date :<input type="text" name="bdate"><br>
    Employee Gender :<input type="text" name="gender"><br>
    Employee Hire Date :<input type="text" name="hdate"><br>
    <input type="submit" value="Inser Record"><br>
 </body>

<?php
$db_connect=pg_connect("host=localhost dbname=testdb user=postgres password=psql")
     or die ("Could not connect to server\n");
$query=pg_query("insert into employees values('$_POST[no]','$_POST[fname]','$_POST[lname]','$_POST[bdate]','$_POST[gender]','$_POST[hdate]');");
$query_display='select * from employees';
$result=pg_exec($db_connect,$query_display);
echo "<table border=1>
				<tr>
				<th>EMP No.</th>
				<th>First Name</th>
				<th>Last Name</th>
   			<th>Birth Date</th>
				<th>Gender</th>
				<th>Hire Date</th>
				</tr>";
while($row=pg_fetch_array($result)) {
	echo "<tr>
	<td>".$row['emp_no']."</td>
	<td>".$row['first_name']."</td>
	<td>".$row['last_name']."</td>
	<td>".$row['birth_date']."</td>
	<td>".$row['gender']."</td>
	<td>".$row['hire_date']."</td></tr>";
}
pg_close($db_connect);   
?>
<br><br>
<a href="test.php">BACK</a>
</html>