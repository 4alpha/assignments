<!DOCTYPE html>
<html>
  <head>
   <title>Update Records</title>
    <style>
        div {
              padding:5px;       }
    </style>
  </head>
  <body>
      <form method="post" action="">
        <center>
            <div>
                <lable>Employee Num To update Records</lable>
                <input type="number" name= "emp_no">
            </div>
            <h2>Enter New Values</h2>
            <div>
                <lable>Name</lable>
                <input type="text" name= "emp_name">
            </div>
            <div>
                <lable>Address</lable>
                <input type="text" name= "address">
            </div>
            <div>
                <lable>Birth Date</lable>
                <input type="date" name= "birth_date">
            </div>
            <div>
                <button type="submit" name = "save">Save</button>
                <button type="reset">Clear</button>
        </center>
    </form>    
  </body>
</html>

  <?php
    if ($_POST ) {
        $db_conn=pg_connect("host=localhost dbname=mydatabase user=postgres password=psql") or die("not connected");
        $emp_no = $_POST['emp_no'];
        $emp_name = pg_escape_string($_POST['emp_name']);
        $address = pg_escape_string($_POST['address']);
        $birth_date = pg_escape_string($_POST['birth_date']);
        $query = "UPDATE employee SET (emp_name, address, birth_date) = ('$emp_name','$address','$birth_date') WHERE emp_no = '$emp_no'";
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
    }
  ?>