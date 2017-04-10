<?php
  $dbconnection = pg_connect("host = localhost dbname = employees user = postgres password = psql")
                  or die("not connected");
  $result = pg_query("select * from department");
  print_r(pg_fetch_all($result));
  // print_r($_POST);
  //  return "hiiiiii";
?>