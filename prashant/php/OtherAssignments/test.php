
<?php
  $dbconn = pg_connect("dbname=publisher");

  // Query that fails
  $res = pg_query($dbconn, "select * from doesnotexist");
  
  echo pg_last_error($dbconn);
?>
