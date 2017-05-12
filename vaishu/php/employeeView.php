<?php
  $databaseconn = pg_connect("host=localhost dbname=testdb1 user=postgres password=psql");
  $result = pg_query($databaseconn,"SELECT * FROM employee");
  $resultData = pg_fetch_all($result);
   echo json_encode($resultData);
  
	?>    
 