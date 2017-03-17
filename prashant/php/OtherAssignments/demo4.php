<!DOCTYPE html>
<html>

  <head>
   <title>Employee Records</title>
   </head>

  <body>
<table border="1">
  <tr>
   <th>emp_no</th>
   <th>Name</th>
   <th>Address</th>
   <th>Birth Date</th>
  </tr>
  
  <?php
  $db_conn=pg_connect("host=localhost dbname=mydatabase user=postgres password=psql") or die("not connected");
  $result = pg_query($db_conn,"select * from employee");
  echo pg_last_error($db_conn);
    while($i = pg_fetch_array($result,null,PGSQL_ASSOC)) {
        echo"<tr>";
        foreach($i as $col_value) {
            echo("<td>$col_value</td>");
            
    }echo "</tr>";
    }
   pg_close($db_conn);
  ?>
  </table>

  </body>

  </html>