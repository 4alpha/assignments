
	<?php

	$dbconn = pg_connect("host=localhost dbname=testdb1 user=postgres  password=psql") or 
	die('could not connect'.pg_last_error());

	echo "Opened database successfully\n";

	$sql="select * from department";
	$result=pg_query($sql) or die('query failed'.pg_last_error());
	echo'<hr>';
	while($line=pg_fetch_array($result)){
	echo "<table><tr><td>$line[0]</td><td>$line[1]</td><td>$line[2]</td></tr></table>"; 	
	}
	
	pg_free_result($result);
	pg_close($dbconn);
	?>
