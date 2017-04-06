<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <div class="h2 text-center mt-3">Department Details</div>
    <div class="container" id="addButton">
      <div class="row offset-md-9">   
          <button type="button" class="btn btn-success mt-3 mb-2"  onclick="showAddDataForm()" id="Add"><i class="fa fa-plus">Add</i></button>
      </div>
    </div>
    <div class="container" id="form" style="display:none">
      <div class="col offset-md-4 ">
        <form method="POST">
          <div class="form-group row mt-4">
            <label for="IdInput" class="col-2 col-form-label">Department-no:</label>  
            <div class="col-4"> 
              <input class="form-control" type="number" id="d_no" name="d_no">    
            </div>
          </div>
          <div class="form-group row">
            <label for="NameInput" class="col-2 col-form-label">Department Name:</label>   
            <div class="col-4"> 
              <input class="form-control" type="text" name="d_name" id="d_name" placeholder="Enter department name"> 
            </div>
          </div>
          <div class="form-group row">
            <label  for="GenderInput" class="col-2 col-form-label">Can have multiple departments:</label> 
            <div class="col-4">    
              <input class="form-control" type="text" name="multiple_departments" id="multiple_departments" placeholder="Enter True or False">
            </div>
          </div>
          <div>
            <input type="submit"  id="add" class="btn btn-success  mt-1 offset-md-4" name="operation" value="add" onclick="return validate()">
            <input type="submit"  class="btn btn-default mt-1 ml-2"  onclick="cancel()" name="cancle" value="cancel">
          </div>
      </div>
      </form>
    </div>
    <div class="container" id="updateForm" style="display:none">
      <div class="col offset-md-4 ">
        <form method="POST">
          <div class="form-group row mt-3">
            <label for="IdInput" class="col-2 col-form-label" >Department-no:</label>  
            <div class="col-4"> 
              <input class="form-control" name="d_no" id="d_id">    
            </div>
          </div>
          <div class="form-group row">
            <label for="NameInput" class="col-2 col-form-label" >Department Name:</label>   
            <div class="col-4"> 
              <input class="form-control" type="text" name="d_name" id="d_name" > 
            </div>
          </div>
          <div class="form-group row">
            <label  for="GenderInput" class="col-2 col-form-label">Can have multiple departments:</label> 
            <div class="col-4">    
              <input class="form-control" type="text" name="multiple_departments" id="multiple_departments" >
            </div>
          </div>
          <div>
            <input type="submit" id="update" class="btn btn-success  mt-1 offset-md-4"  name="operation" value="update">
            <input type="submit"  class="btn btn-default mt-1"  onclick="cancel()" name="cancle" value="cancel">
          </div>
        </form>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <script>
      function showAddDataForm() {
        document.getElementById("tableContainer").style.display = "none";
        document.getElementById("form").style.display = "block";     
        document.getElementById("addButton").style.display = "none";
      }
      
      function cancle() {
        document.getElementById("addButton").style.display = "block";
        document.getElementById("tableContainer").style.display = "block";
        document.getElementById("form").style.display = "none";     
      }
      
      function updateData(d_no) { 
        document.getElementById('d_id').value = d_no;
        console.log(document.getElementById('d_id').value);
        document.getElementById('addButton').style.display = 'none';
        document.getElementById('tableContainer').style.display = 'none';
        document.getElementById('updateForm').style.display = 'block';
        return false;
      }
      
      function validate(form){
        var regForName = /^[a-zA-Z ]{2,30}$/;
        var name = document.getElementById("d_name").value;
        var gender = document.getElementById("multiple_departments").value;
        if(name == "" || gender == ""){
          alert("Please enter department information");
          return false;
        } else if(regForName.test(name)){
            return true;
        } else {
            alert("please enter valid Department name");
            return false;
        }
      }
    </script>
  </body>
</html>


<?php
  error_reporting('E_ALL');
  ini_set("display_errors",1);

  $_POST['View']= "Department";

  include 'common.php'; 
  if(isset($_POST['operation'])) {
    if($_POST['operation'] == 'add') {
      if(!$result) {
        echo "<div class='alert alert-success col-5 offset-md-4' role='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                    Data is not inserted
                  </div>";
      } else {
          echo "<div class='alert alert-success col-5 offset-md-4' role='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                    Data is inserted successfully
                  </div>";            
      }
    } elseif($_POST['operation'] == 'getRow') {
        if($result == 0){
          echo $result;
        } else {
            display($result);
        }  
    } elseif($_POST['operation'] == 'getAll') {
        display($result); 
    } elseif($_POST['operation'] == 'update') {
        echo "<div class='alert alert-success col-5 offset-md-4 ' role='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                   $result
                  </div>";
    } else {
        echo $result;
    }      
  }   

  $result=$controller->getAll();
  echo "<div class='container' id='tableContainer'>
          
          <div class='row offset-md-3'>
            <table  class='table table-hover table-bordered table-responsive'>
              <thead class='thead-inverse'>
                <tr class='md'>
                <th>Department No</th>
                <th>Name</th>
                <th>Can Have Multiple Departments</th>
                <th>Edit</th>
                <th>Delete</th>
                </tr>
              </thead>";
        while($row = pg_fetch_assoc($result)) {
        echo "<tbody>
                <tr class='sm'>";
         foreach($row as $column){
          echo "<td>$column</td>";
         }
         echo "<td>
               <a href='?operation=update&d_no=$row[d_no]' onclick='return updateData($row[d_no])' class='btn btn-info btn-sm' type='button'><i class='fa fa-pencil'></i>Edit
               </a></td>
               <td><a href='?operation=delete&d_no=".$row['d_no']."' type='submit' name='operation' value='delete' class='btn btn-danger btn-sm'><i class='fa fa-trash'></i>Delete
               </a> </td>";
         echo "</tr>";
       }
       echo "</tbody></table></div></div>"; 
      
  
?>
