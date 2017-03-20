<?php 
$_POST['View'] = "EmployeeController";
require_once 'controller.php';

ini_set("display_errors",1);

if( isset( $_POST["operation"] ) ) {   
    if( $_POST['operation'] == "getRow" ) {
        echo "<table border = 1>
        <tr> <th> Employee id </th>
        <th> Birth date </th> 
        <th> First name </th>
        <th> Last name </th>
        <th> Join date </th></tr> ";
        foreach( $result AS $row ) {            
            echo "<tr>
            <td>" . $row['emp_no'] . "</td>
            <td>" . $row['birth_date']  . "</td>
            <td>" . $row['first_name']  . "</td>
            <td>" . $row['last_name']  . "</td>
            <td>" . $row['join_date']  . "</td>
            <tr>";
        } 
        echo "</table>";  
    } else {
        print_r( $result );
    }
}
?>
<!DOCTYPE html>
<html>
    <body>
        <form method="POST" action="">
            <div>
                <h1> Employee Info</h1>
                <div>
                    <label> Enter Employee number: </label>
                    <input type="text" value="" name="emp_no">
                </div>
                <div>
                    <label> Enter Employee Birth date : </label>
                    <input type="text" value="" name="birth_date">
                </div>
                <div>
                    <label> Enter Employee first name : </label>
                    <input type="text" value="" name="first_name">
                </div>
                <div>
                    <label> Enter Employee last name : </label>
                    <input type="text" value=""name="last_name">
                </div>
                <div>
                    <label> Enter Employee join date : </label>
                    <input type="text" value="" name="join_date">
                </div>
                <div>
                    <input type="submit"  name="operation" value="getRow">
                    <input type="submit" name="operation" value="addData">
                    <input type="submit" name="operation" value="updateData">
                    <input type="submit" name="operation" value="delete" >
                </div>
            </div>
            <div>
        </form> 
    </body>
<html>
