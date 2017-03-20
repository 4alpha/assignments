<!DOCTYPE html>
<html>
  <body>
    <form method="POST" action="delete.php">
    <h2>Delete Record of given employee number.</h2>
    Employee Number :<input type="text" name="no"><br>
    <input type="submit" value="Delete Record"><br>
 </body>

<?php
$db_connect=pg_connect("host=localhost dbname=testdb user=postgres password=psql")
     or die ("Could not connect to server\n");
$query=pg_query("delete from employees where emp_no=('$_POST[no]');");
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