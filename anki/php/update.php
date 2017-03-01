<!DOCTYPE html>
<html>
  <body>
    <form method="POST" action="update.php">
    <h2>Update Record of given employee number.</h2>
    Employee Number :<input type="text" name="noupdate"><br>
    <input type="submit" name="select" value="Select"><br>
    <h2>Update Records :</h2>
    
    <input type="submit" name="update" value="Update Record"><br>
		<a href="test.php">BACK</a>
 </body>
 <?php
$db_connect=pg_connect("host=localhost dbname=testdb user=postgres password=psql")
     or die ("Could not connect to server\n");
$query=pg_query("select * from employees where emp_no=('$_POST[noupdate]');");
$row=pg_fetch_assoc($query);
if($_POST['select']) {
echo " Employee Number :<input type='text' name='no' value='$row[emp_no]'><br>
    Employee FIrst Name :<input type='text' name='fname' value='$row[first_name]'><br>
    Employee Last Name :<input type='text' name='lname' value='$row[last_name]'><br>
    Employee Birth Date :<input type='text' name='bdate' value='$row[birth_date]'><br>
    Employee Gender :<input type='text' name='gender' value='$row[gender]'><br>
    Employee Hire Date :<input type='text' name='hdate' value='$row[hire_date]'><br>";
} 
$queryupdate=pg_query("update employees set emp_no='$_POST[no]', first_name='$_POST[fname]', last_name='$_POST[lname]',birth_date='$_POST[bdate]',gender='$_POST[gender]',hire_date='$_POST[hdate]' where emp_no='$_POST[no]';");
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
<br>
</html>