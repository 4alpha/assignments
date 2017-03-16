<?php
if(isset($_POST["submit"])) {
    include 'controller.php';
    if(($_POST["menu"])=='getAll') {  
        echo "<table border = 1>
            <tr><th>EMP NO</th>
            <th>EMP NAME</th>
            <th>ADDRESS</th>
            <th>DOB</th></tr>
            ";
        foreach($result AS $row) {            
            echo "<tr>
                <td>". $row['emp_no']."</td>
                <td>".$row['emp_name']."</td>
                <td>".$row['address']."</td>
                <td>".$row['birth_date']."</td>
                <tr>";
            } echo "</table>";       
    }
    if(($_POST["menu"])=='get') {
        print_r($result);
     }    
     if($_POST["menu"]=="add") {
          printf("Affected rows:%d",$result); 
     }
     if($_POST["menu"]=="update") {
           printf("Affected rows:%d",$result);
    }
    if($_POST["menu"]=="delete") {
             printf("Affected rows:%d",$result);
    }
 }
?>