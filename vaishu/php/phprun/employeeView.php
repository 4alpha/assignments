<?php
  require_once 'Config.php';
  $_POST['View'] = 'Employee';
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
    $result = $obj->getAll(); 
     if($result != false ) {
          echo "
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
                        '<a href="?&emp_no='.$row['emp_no'].'&emp_name='.$row['emp_name'].'" type="button" class="btn btn-info form-group" id="update" onclick="return showUpdateForm('.$row['emp_no'].', \''.$row['emp_name'].'\')">Update                           <i class="fa fa-pencil"></i>
                         </a>
                         <a href="?submit=delete&emp_no='.$row['emp_no'].'" type="button" class="btn btn-danger form-group " id ="delete" name="submit" value="delete" onclick="return deleteEntryFromTable('.$row['emp_no'].')">Delete
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
        
	?>    
 