<?php
  $db_connection = pg_connect( "host = localhost  port = 5432 dbname = test user = postgres password = psql " );
  $query = "SELECT * FROM employee";
  $allData = pg_query($query);
  $result = pg_fetch_all($allData);
  echo json_encode($result);
?>