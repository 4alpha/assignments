 <!DOCTYPE html>
  <html>
    <head>
      <title>Employee Details</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">      <script>
        function showAddForm() {
           var x = document.getElementById('formAddDisplay');
           var y = document.getElementById('tableRecord');
           var z = document.getElementById('add');
           z.style.display = 'none';
           y.style.display = 'none';
            if (x.style.display === 'none') {
             console.log("block");
              x.style.display = 'block';
            } else {
              console.log("block");
              x.style.display = 'none'
            }
        }

        function showUpdateForm($empno) {
          var x = document.getElementById('formUpdateDisplay');
          var y = document.getElementById('tableRecord');
          var z = document.getElementById('add');
          z.style.display = 'none';
          y.style.display = 'none';
          if (x.style.display === 'none') {
            console.log($empno);
            document.getElementById('empno').value = $empno;
            x.style.display = 'block';
            return false;
          } else {
            console.log("block");
            x.style.display = 'none'
          }
        }

        function showDeleteForm($empno) {
           var x = document.getElementById('formDeleteDisplay');
           var y = document.getElementById('tableRecord');
           var z = document.getElementById('add');
           z.style.display = 'none';
           y.style.display = 'none';
            if (x.style.display === 'none') {
              console.log($empno);
             document.getElementById('empno').value = $empno;
              x.style.display = 'block';
              return false;
            } else {
              console.log("block");
              x.style.display = 'none'
            }
        }

      </script>
    </head>
    <body>
      <div class="container">
        <div class="col align-self-center">
          <h1>Employee Details</h1>
          <div class="container" id="formAddDisplay" style="Display:none">
            <form method="POST">
              Empno <input type="number" id="no" name="emp_no">
              empname <input type="text" id="name" name="emp_name"><br>
              <input type="submit"  class="btn btn-success" name="submit" value="add" >
              <button type="submit" class="btn btn-info">cancel</button>
            </form>
         </div>
         <div class="container" id="formUpdateDisplay" style="Display:none">
            <form method="POST">
              empno <input type="number" id="empno" name="emp_no">
              empname <input type="text" id="empname" name="emp_name"><br>
              <input type="submit"  class="btn btn-success" name="submit" value="update" >
              <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">cancel</button>
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Do you want to cancel</h4>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
         </div>
         <div class="container" id="formDeleteDisplay" style="Display:none">
           <form method="POST">
              empno <input type="number" id="empno" name="emp_no">
              empname <input type="text" id="empname" name="emp_name"><br>
              <input type="submit"  class="btn btn-danger" name="submit" value="delete">
              <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">cancel</button>
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Do you want to cancel</h4>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Yes</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
         </div>
        </div>
        <div class="row">
          <div class='col offset-md-10'>
            <input type="button" id="add" class="btn btn-success" value="add" onclick="showAddForm()">
          </div>
        </div>
      </div>
    </body>
      <?php
        require_once 'Config.php';
        $_POST['View'] = 'Employee';
        include_once 'AutoLoader.php';
        if(!$result == false ) {
          echo $result;
        }
         $result = $obj->getAll($query); 
          if($result != false ) {
            echo "
              <div class='container' id='tableRecord'>
                <div class=col align-self-center>
                  <table border=1 class='table table-striped'>
                    <tr>
                      <th>EMP NO</th>
                      <th>EMP NAME</th>
                      <th>EDIT</th>
                    </tr>";
                    foreach($result AS $row) {            
                      echo "
                      <tr>
                        <td>".$row['emp_no']."</td>
                        <td>".$row['emp_name']."</td>
                        <td>".
                          '<a href="?submit=update&emp_no='.$row['emp_no'].'" class="btn btn-info" type="submit" onclick="return showUpdateForm('.$row['emp_no'].')">
                            <i class="fa fa-pencil"></i>
                          </a>
                          <a href="?submit=delete&emp_no='.$row['emp_no'].'" class="btn btn-danger" type="submit" name="submit" value="delete">
                            <i class="fa fa-trash"></i>
                          </a>'
                        . "</td>
                      </tr>";
                    } 
                    echo "
                  </table>
                </div>
              </div>";
          } else {
            echo $result;
          }
            
      ?>
      <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>  
  
</html>