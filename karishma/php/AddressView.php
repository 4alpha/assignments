<?php 
$_POST['View'] = "AddressController";
require_once 'controller.php';
ini_set("display_errors",1);

if( isset( $_POST["operation"] ) ) {   
    if( $_POST['operation'] == "getRow" ) {
        echo "<table border = 1>
        <tr> <th> Pin code </th>
        <th> Local Address </th> </tr> ";
        foreach( $result AS $row ) {            
            echo "<tr>
            <td>".$row['pin_code']."</td>
            <td>".$row['addr']."</td>
            <tr>";
        }
         echo "</table>";  
    } else {
        echo $result;
    }
}
?>

<!DOCTYPE html>
<html>
    <body>
        <form method="POST">
            <div>
                <h1> Address Info </h1>
            </div>
            <div>
                <label> Enter pin code: </label>
                <input type="number" value="" name="pinCode">
            </div>
            <div>
                <label> Enter Local Address : </label>
                <input type="text" value="" name="localAddress">
            </div>
            <div>
                <input type="submit" name="operation" value="getRow">
                <input type="submit" name="operation" value="addData">
                <input type="submit" name="operation" value="updateData">
                <input type="submit" name="operation" value="delete" >
            </div>
        </form>
    </body>
</html>

