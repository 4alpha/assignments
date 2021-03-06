<?php 
  use Service\DepartmentService as DepartmentService;
  $_POST['View']= "Employee";
  
  include 'common.php';  
  $dept = new DepartmentService();
  $res = $dept->getAllDepartmentNames();
  //print_r($GLOBALS['department']);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="h2 text-center mt-3">Employee Details</div>
    <div class="container" id="addButton">
      <div class="row">
        <div class="col offset-md-7">
          <button type="button" class="btn btn-success mt-3 mb-2" name="submit" value="Add" onclick="showAddDataForm()" id="Add"><i class="fa fa-plus">Add</i></button>
        </div>
      </div>
    </div>
    <div class="container" id="form" style="display:none">
      <div class="col offset-md-4 ">
        <form method="POST">
          <div class="form-group row mt-3">
            <label for="IdInput" class="col-2 col-form-label">Id-no:</label>  
            <div class="col-4"> 
              <input class="form-control" type="number" name="emp_no" id="emp_no" >    
            </div>
          </div>
          <div class="form-group row">
            <label for="NameInput" class="col-2 col-form-label">Name:</label>   
            <div class="col-4"> 
              <input class="form-control" type="text" name="name" id="name" placeholder="Enter your name" > 
            </div>
          </div>
          <div class="form-group row">
            <label  for="GenderInput" class="col-2 col-form-label">Gender:</label> 
            <div class="col-4">    
              <input type="radio" name="gender" id="male" value="M"> Male
              <input type="radio" name="gender" id="female" value="F"> Female
            </div>
          </div>
          <div class="form-group-row">
             <label  for="DeptInput" class="col-2 col-form-label">Select Department</label> <?php  getDepartmentName(); ?>
          </div>
          <div>
            <input type="submit"  id="add" class="btn btn-success  mt-4 offset-md-4" name="operation" value="add" onclick="return validate()">
            <input type="submit" id="update" class="btn btn-success  mt-4 offset-md-4"  name="operation" value="update" onclick="return validate()">
            <input type="submit"  class="btn btn-default mt-4 ml-2"  onclick="cancel()" name="cancle" value="cancel">
          </div>
        </form>
      </div>
    </div>
   
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script src="functions.js"></script>
  </body>
</html>


<?php
  error_reporting('E_ALL');
  ini_set("display_errors",1);
  // use Service\DepartmentService as DepartmentService;
  // $_POST['View']= "Employee";
  
  // include 'common.php'; 
  
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






