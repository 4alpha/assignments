
<?php
  // Connect to the database
  pg_connect("host=localhost dbname=mydatabase user=postgres password=psql") or die("not connected");

  // Create a sample table
  pg_query("CREATE TABLE test (a INTEGER) WITH OIDS");

  // Insert some data into it
  $res = pg_query("INSERT INTO test VALUES (1)");

  $oid = pg_last_oid($res);
?>
