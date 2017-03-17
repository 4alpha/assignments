<?php

 echo"hello";
echo"<br>";
$db_conn=pg_connect("host=localhost dbname=mydatabase user=postgres password=psql");
$sts = pg_connection_status($db_conn);
if($db_conn)
{
	echo"conected <br>";
}
else
{
echo"not connected <br>";
}

$result = pg_query($db_conn,"select * from employee");
print_r(pg_fetch_array($result));
?>
