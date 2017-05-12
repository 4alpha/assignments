 <!DOCTYPE html>
  <html>
    <head>
      <title>Employee Details</title>
      <center>
        <div style="margin-top:50px">
          <div class="form-group">
            <h1>Employee Details</h1>
          </div>
        </div>
      </center>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">      <script>
        function showAddForm(checkid, empno = null, empname = null) {
          var formAdd = document.getElementById('formAddDisplay');
          var table = document.getElementById('tableRecord');
          var add = document.getElementById('add');
          add.style.display = 'none';
          table.style.display = 'none';
          formAdd.style.display = 'block';
          if(checkid == 'add') {
            formAdd.style.display = 'block';
            document.getElementById('no').value = null;
            //  document.getElementById('empname').value = null;
            document.getElementById('addData').value = "add";
          } 
          if(checkid == 'update'){
            document.getElementById('addData').value = "update";
            document.getElementById('no').value = empno;
            console.log(empname);
            document.getElementById('empname').value = empname;
            formAdd.style.display = 'block';
            return false;
           }
        }

        function nameValidation(check_id) {
          if(check_id == 'AddForm') {
          var addValue =   document.getElementById('empname').value;
          } else {
            var addValue =   document.getElementById('name').value;
          }
          var matches = addValue.match(/\d+/g);
          if(addValue == '') {
            alert('please enter employee name it is empty');
              return false;
          }
          if (matches != null ) {
              alert('Enter charcters only Invalid String');
              return false;
          }
        }

        function showTable() {
          var formAdd = document.getElementById('formAddDisplay');
          var table = document.getElementById('tableRecord');
          var add = document.getElementById('add');
          formAdd.style.display = 'none';
            if (table.style.display === 'none') {
              table.style.display = 'block';
              add.style.display = 'block';
              
            } 
        }
      </script>
    </head>
    <?php
      $_POST['View'] = 'Employee';
      require_once 'Config.php';
      include_once 'AutoLoader.php';
      if(!$result == false ) {
         echo "<div class='col offset-md-3 col-md-6 form-group'>
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
                </button>
                <strong>$result</strong> 
              </div>
              </div>
              ";
      }
      $result = $obj->getAll($query); 
        if($result != false ) {
          echo "
            <div class='row'>
              <div class='col offset-md-7 form-group'>
                <input type='button' id='add' class='btn btn-success' value='InsertRecord' onclick='showAddForm(this.id)'>
              </div>
            </div>
            <div class='container' id='tableRecord'>
              <div class=col align-self-center><center>
                <table  class='table table-striped table-responsive'>
                  <thead class='thead-inverse'>
                    <tr>
                      <th>EMP NO</th>
                      <th>EMP NAME</th>
                      <th>EDIT</th>
                    </tr>
                  </thead>";
                  foreach($result AS $row) {            
                    echo "
                    <tr>
                      <td>".$row['emp_no']."</td>
                      <td>".$row['emp_name']."</td>
                      <td>".
                        '<a href="?&emp_no='.$row['emp_no'].'&emp_name='.$row['emp_name'].'" type="button" class="btn btn-info form-group" id="update" onclick="return showAddForm(this.id,'.$row['emp_no'].', \''.$row['emp_name'].'\')">Update
                           <i class="fa fa-pencil"></i>
                         </a>
                         <a href="?submit=delete&emp_no='.$row['emp_no'].'" class="btn btn-danger form-group " name="submit" value="delete">Delete
                           <i class="fa fa-trash"></i>
                         </a>'
                       . "</td>
                    </tr>";
                    } 
                    echo "
                  </table></center>
                </div>
              </div>";
          } else {
            echo "
              <div class='alert alert-info' role='alert'>
                $result
              </div>
              ";
          }
          
	 function getDepartmentName() {
   	   $sql = pg_query("SELECT * FROM department");

           if (pg_num_rows($sql)) {
            $select = '<select name="departments[]" multiple required>';
            while ($rs = pg_fetch_array($sql)) {
              $select.='<option value="' . $rs['dept_no'] .'">' . $rs['dept_name'] . '</option>';
              
            }
           }
         $select.='</select>';
         echo $select;
  
        }  
      
	?>
    <body>
      <div class="container">
        <div class="col align-self-center">
          <div class="container" id="formAddDisplay" style="display:none">
            <form method="POST" id="AddForm" onsubmit=" return nameValidation(this.id)">
              <div class="col offset-md-3 col-md-6">
                <div class="form-group">
                  Employee Number <input class="form-control input-sm" type="number" id="no" name="emp_no" readonly>
                </div>
                <div class="form-group">  
                  Employee Name <input class="form-control input-sm" type="text" id="empname" name="emp_name"><br>
                </div>
		            <div class="form-group">  
                   <?php getDepartmentName();?>
                </div>
                <div class="form-group">
                  <div class="form-group" id="addButton">
                    <input type="submit"  class="btn btn-success" name="submit" id="addData">
                   </div>
                  <button type="button" class="btn btn-info " data-toggle="modal" data-target="#addModal">cancel</button>
                </div>
                <div class="modal fade" id="addModal" role="dialog">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Add</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                      <div class="modal-body">
                        <p>Do you want to cancel </p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="showTable()" >Yes</button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">No</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
   
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>  
</html>