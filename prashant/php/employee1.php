<!DOCTYPE html>
<html>
    <head>
        <title>Employee Records</title>
    </head>
    <body>
        <form method = "POST" action = "employee.php">
            <center>
                <h1>EMPLOYEE INFO</h1>
                <hr>
                <div style="padding: 10px">
                    <label>EMP NO</label><input type="text" name = "emp_no"><br>
                </div>
                <div style="padding: 10px">
                    <label>EMP Name</label><input type="text" name = "emp_name"><br>
                </div>
                <div style="padding: 10px">
                    <label>EMP Address</label><textarea name = "emp_address" rows="4" cols="40"></textarea><br>
                </div>
                <div style="padding: 10px">
                    <label>DOB </label><input type="date" name = "DOB"><br>
                </div>
                <hr>
                <h3>MENU</h3>
                <div style="padding: 10px">               
                    <input type = "radio" name = "menu" value = "getRows">GET RECORDS<br>
                    <input type = "radio" name = "menu" value = "add">ADD RECORD<br>
                    <input type = "radio" name = "menu" value = "update">UPDATE RECORD<br>
                    <input type = "radio" name = "menu" value = "delete">DELETE RECORD<br><br>
                </div>
                <center>
                    <button type = "submit"> SEND </button>
                </center>
            </center>
        </form>
    </body>
</html>
<?php
/*if ( $_POST ) {
    class Employee {
        var $emp_no;
        var $emp_name;
        var $emp_address;
        var $DOB;
        function __construct($emp_no, $emp_name,$emp_address, $DOB) {
            $db_conn=pg_connect("host=localhost dbname=mydatabase user=postgres password=psql") or die(pg_last_error());
            $this->emp_no = $emp_no;
            $this->emp_name = $emp_name;
            $this->emp_address = $emp_address;
            $this->DOB = $DOB;
        }
        function getRows() {
            $db_conn=pg_connect("host=localhost dbname=mydatabase user=postgres password=psql") or die(pg_last_error());
            $query = "select * from employee ORDER BY emp_no";
            $result = pg_query($db_conn,$query);
            //print_r($result); 
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
        }
        function addRecord($emp_name, $emp_address, $DOB) {
            $query = "INSERT INTO employee(emp_name, address, birth_date) VALUES('". $emp_name . "', '" . $emp_address."', '".$DOB. "')";
            $result = pg_query($query);
        }
        function updateRecord($emp_no,$emp_name, $emp_address, $DOB) {
            $query = "UPDATE employee SET (emp_name, address, birth_date) = ('$emp_name','$emp_address','$DOB') WHERE emp_no = '$emp_no'";
            $result = pg_query($query);
        }
        function deleteRecord($emp_no) {
            $query = "DELETE FROM employee where emp_no = ".$emp_no;
            $result = pg_query($query);
        }
    }
    $option = $_POST['menu'];
    $emp_no = $_POST['emp_no'];
    $emp_name = $_POST['emp_name'];
    $emp_address = $_POST['emp_address'];
    $DOB = $_POST['DOB'];
    $emp = new Employee();
    switch($option) {
        case getRows:
            $emp->getRows();
            
            break;
        case add:
            $emp->addRecord($emp_name, $emp_address, $DOB);
            break;
        case update:
            $emp->updateRecord($emp_no, $emp_name, $emp_address, $DOB);
            break;
        case delete:
            $emp->deleteRecord($emp_no);
            break;
        default:
            echo'Invalid option';
    }
}pg_close($db_conn);
*/?>
                