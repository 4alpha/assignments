<?php
  $db_connect = pg_connect("host = localhost dbname = testdb user = postgres password = psql") or die('connection failed');
  $result = pg_query($db_connect,"SELECT * FROM employees");
  $ans = pg_fetch_all($result);
  echo json_encode($ans);
?>