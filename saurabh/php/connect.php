
<?php
try {
  $dbconn = pg_connect("host=localhost dbname=employees user=postgres password=psql")
            or die('Could not connect: ');
  print(pg_last_error($dbconn));
  $query = 'SELECT * FROM employees';
  $result = pg_query($dbconn,$query);// or die('Query failed: ' . pg_last_error());
  if($result === false)
  {
    print(pg_last_error($dbconn));
  }
  echo "<table>\n";
  while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
      echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
  }
  echo "</table>\n";
  pg_free_result($result);
  pg_close($dbconn); 
}
catch(DependencyException $e) {
  echo $e->errorMessage();
}
?>
