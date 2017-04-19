<?php
  error_reporting('E_ALL');
  ini_set("display_errors",1);

  use Service\DepartmentService as DepartmentService;
  $_POST['View']= "Employee";
  
  include 'common.php';  
  $dept = new DepartmentService();
  $res = $dept->getAllDepartmentNames();
  //print_r($GLOBALS['department']);
  if(isset($_POST['operation'])) {
    if($_POST['operation'] == 'add') {
      if(!$result) {
        echo "<div class='alert alert-success col-4 offset-md-4 ' role='alert'>
                    Data is not added
                  </div>";
      } else {
          echo "<div class='alert alert-success col-4 offset-md-4 ' role='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                   $result;
                  </div>";            
      }
    } elseif($_POST['operation'] == 'update') {
        echo "<div class='alert alert-success col-4 offset-md-4 ' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
                  $result
              </div>";
    } else {
        echo "<div class='alert alert-success col-5 offset-md-4 ' role='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                   $result
                  </div>";
    }      
  }   

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
                <a href='?operation=update&emp_no='.$row[emp_no].'&name='.$row[name].'&gender='.$row[gender].'' onclick='return updateData(" . $row['emp_no'] . ", \"" . $row['name']. "\", \"" . $row['gender']. "\")' class='btn btn-info btn-sm' type='button'><i class='fa fa-pencil'></i>Edit
                </a>
               </td>
               <td>
                <a href='?operation=delete&emp_no=".$row['emp_no']."' type='submit' name='operation' value='delete' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i>Delete
                </a>
               </td>";
         echo "</tr>";
        }
       echo "</tbody></table></div></div></div>"; 
        
      function getDepartmentName() {
          //print_r($GLOBALS['department']);
          $select = '<select id="select" multiple="multiple" name="department[]">';
          foreach($GLOBALS['department'] as $row){
           $select.='<option  value="' .$row['d_no'].'">' . $row['d_name'] . '</option>';       
          }
           $select.='</select>';
         echo $select;
     
    }
   
  
?>