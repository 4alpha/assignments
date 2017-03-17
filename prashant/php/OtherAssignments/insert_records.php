 <?php
    if ( $_POST ) {
        $db_conn=pg_connect("host=localhost dbname=mydatabase user=postgres password=psql") or die("not connected");
        //$emp_no = pg_escape_string($_POST['emp_no']);
        $emp_name = pg_escape_string($_POST['emp_name']);
        $address = pg_escape_string($_POST['address']);
        $birth_date = pg_escape_string($_POST['birth_date']);
        $query = "INSERT INTO employee(emp_name, address, birth_date) VALUES('". $emp_name . "', '" . $address."', '".$birth_date. "')";
        $result = pg_query($query);
        if (!$result) {
            $errormessage = pg_last_error();
            echo "Error with query: " . $errormessage;
            exit();
        } else {
            $squery = "select * from employee ORDER BY emp_no";
            $rs=pg_query($squery);
            echo "<table border = 1>
                    <tr><th>EMP NO</th>
                    <th>EMP NAME</th>
                    <th>ADDRESS</th>
                    <th>DOB</th></tr>";
            while ($row = pg_fetch_array($rs)) {
                echo "<tr>
                        <td>".$row['emp_no']."</td>
                        <td>".$row['emp_name']."</td>
                        <td>".$row['address']."</td>
                        <td>".$row['birth_date']."</td>
                    <tr>";
            } echo "</table>";
        }
   pg_close($db_conn);
    
    echo"<br><br>";
    
    
    }
  ?>