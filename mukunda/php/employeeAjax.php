<?php
  error_reporting('E_ALL');
  ini_set("display_errors",1);
  $_POST['View']= "Employee";
  
   include 'common.php';  
   include 'Controller.php';
  
  $result = $controller->getAll();
  echo "<div class='container' id='tableContainer'>
         <div class='col offset-md-4'>
          <div class='row col-lg-5'>
            <table  class='table table-hover table-bordered table-responsive'>
              <thead class='thead-inverse'>
                <tr class='sm'>
                <th>id</th>
                <th>name</th>
                <th>gender</th>
                <th>Edit</th>
                <th>Delete</th>
                </tr>
              </thead>";
        foreach ($result as $row) {
          echo "<tr>";
          echo "<td>".$row['emp_no']."</td>";
          echo "<td>".$row['name']."</td>";
          echo "<td>".$row['gender']."</td>";
          echo "<td>
                <a href='?operation=update&emp_no=".$row['emp_no']."&name=".$row['name']."&gender=".$row['gender']."' onclick='return updateData(" . $row['emp_no'] . ", \"" . $row['name']. "\", \"" . $row['gender']. "\")' class='btn btn-info btn-sm' type='button'><i class='fa fa-pencil'></i>Edit
                </a>
               </td>
               <td>
                <button href='#' type='button' name='operation' value='delete' id='delete' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#deleteModal'  onclick='return deleteData(" . $row['emp_no'] . ")'><i class='fa fa-trash'></i>Delete
                
               </td>";
         echo "</tr>";
        }
       echo "</tbody></table></div></div></div>"; 
      
?>