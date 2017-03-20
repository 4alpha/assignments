<?php
	$db_connect=pg_connect("host=localhost dbname=testdb user=postgres password=psql") or die ("Could not connect to server\n");
	$query='select * from employees';
	$result=pg_exec($db_connect,$query);
	//$numrows=pg_numrows($result);
	echo "<center><table border=1>
					<tr>
					<th>EMP No.</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Birth Date</th>
					<th>Gender</th>
					<th>Hire Date</th>
					</tr></center>";
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
<html>
  <head>
    <title>TEST</title>
  </head>
  <body>
		<center>
			<h2>Employee Information</h2>
			<br><br>
  	  <a href="insert.php">INSERT-- </a>
			<a href="update.php"> UPDATE-- </a>
			<a href="delete.php"> DELETE</a>
  	  <br><br>
		</center>
  </body>
</html>
