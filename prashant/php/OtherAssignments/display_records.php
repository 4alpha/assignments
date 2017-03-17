
  <?php
  $db_conn=pg_connect("host=localhost dbname=mydatabase user=postgres password=psql") or die(pg_last_error());
  $query = "select * from employee ORDER BY emp_no";
  $result = pg_query($db_conn,$query);
  
  //echo pg_last_error($db_conn);
  echo "<table border = 1>
          <tr><th>EMP NO</th>
          <th>EMP NAME</th>
          <th>ADDRESS</th>
          <th>DOB</th></tr>
          ";
    while ($row = pg_fetch_array($result)) {
      echo "<tr>
              <td>". $row['emp_no']."</td>
              <td>".$row['emp_name']."</td>
              <td>".$row['address']."</td>
              <td>".$row['birth_date']."</td>
            <tr>";
    } echo "</table>";       
   pg_close($db_conn);
  ?>
 