 <!DOCTYPE html>
  <html>
    <head>
      <title>Employee Details</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
      <script>
        function showAddForm() {
          var addInformation = document.getElementById('addInformation');
          var table = document.getElementById('tableRecord');
          var addButton = document.getElementById('add');
          addButton.style.display = 'none';
          table.style.display = 'none';
          if (addInformation.style.display === 'none') {
            console.log("block");
            addInformation.style.display = 'block';
          } else {
            console.log("block");
            addInformation.style.display = 'none'
          }
        }

      function showUpdateForm($pinCode) {
        var updateInformation = document.getElementById('updateInformation');
        var table = document.getElementById('tableRecord');
        var addButton = document.getElementById('add');
        addButton.style.display = 'none';
        table.style.display = 'none';
        if (updateInformation.style.display === 'none') {
          console.log($pinCode);
          document.getElementById('pinCode').value = $pinCode;
          updateInformation.style.display = 'block';
          return false;
        } else {
          console.log("block");
          updateInformation.style.display = 'none'
        }
      }

      function showDeleteForm($pinCode) {
        var table = document.getElementById('tableRecord');
        var addButton = document.getElementById('add');
        addButton.style.display = 'none';
        table.style.display = 'none';
      }

      function onPrevious() {
        document.getElementById('addInformation').style.display = 'none';
        document.getElementById('updateInformation').style.display = 'none'; 
        document.getElementById('tableRecord').style.display = 'block';
        document.getElementById('add').style.display = 'block';
      }

      function addressValidation(check_id) {
        if(check_id=='addData') {
         var addData =   document.getElementById('addressData').value;
        } else {
          var addData =   document.getElementById('localAddress').value;
        }
        var matches = addData.match(/\d+/g);
        if (matches != null) {
            alert('Invalid String');
            return false;
        }
      }

      </script>
  </head>
  <body>
    <div class="container"style="border: solid" >
    <div class="col align-self-center">
    <div align="center" ><h1>Address Details</h1></div>

    <div class="container" align="center" id="addInformation" style="Display:none" >
      <form method="POST">
        <div class="row" >
          <div class="col-lg-8 centered" style="height:200px">
              <div class="form-group">
                  Pin Code <input type="number" id="no" name="pinCode">
              </div>
              <div class="form-group">
                  Local Address <input type="text" id="addressData" name="localAddress">
              </div>
              <div class="form-group">
                  <input type="submit"  class="btn btn-success" name="operation" value="addData" id="addData" onclick=" return addressValidation(this.id)">
                  <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModalForAdd" name="operation">cancel</button>
              </div>
          </div>
          <div class="modal fade" id="myModalForAdd" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Do you want to cancel</h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="onPrevious()">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" >No</button>
              </div>
            </div>
          </div>
        </div>
        </div>
      </form>
    </div>

    <div class="container" id="updateInformation" style="Display:none">
      <form method="POST">
        <div align="center">
          <div class="form-group" >
              Pin Code <input type="number" id="pinCode" name="pinCode">
          </div>
          <div class="form-group">
                  Local Address <input type="text" id="localAddress" name="localAddress">
          </div>
          <div class="form-group">
                  <input type="submit"  class="btn btn-success" name="operation" value="UpdateData" id="updateData"  onclick=" return addressValidation(this.id)">
                  <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal" name="operation">cancel</button>
          </div>
        </div>
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Do you want to cancel</h4>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="onPrevious()">Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" >No</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>

    </div>
      <div class="row">
        <div class='col offset-md-10'>
          <input type="button" id="add" class="btn btn-success" value="Insert Record" onclick="showAddForm()">
        </div>
      </div>
    </div>
  </body>
  <?php
  $_POST['View'] = "AddressController";
  require_once 'controller.php';  

  if($result) {
    echo "<div class='alert alert-info alert-dismissible fade show' role='alert'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    <strong>$result</strong>
    </div>"; 
    }
    $result = $controller->getRow($_REQUEST);
    echo "
      <div class='container' id='tableRecord'>
        <div class=col align-self-center>
          <table border=1 class='table table-bordered'>
            <thead class='thead-inverse'>
            <tr>
              <th>Pin Code</th>
              <th>Local Address</th>
              <th>EDIT</th>
            </tr> </thead>";
            foreach($result AS $row) {            
              echo "
              <tr>
                <td>".$row['pin_code']."</td>
                <td>".$row['addr']."</td>
                <td>".
                  '<a href="?operation=UpdateData&pin_code='.$row['pin_code'].'" value="UpdateData" class="btn btn-info" type="submit" name="operation" onclick="return showUpdateForm('.$row['pin_code'].')"> Update
                    <i class="fa fa-pencil"></i>
                  </a>
                  <a href="?operation=delete&pin_code='.$row['pin_code'].'" class="btn btn-danger" type="submit" name="operation" value="delete"> Delete
                    <i class="fa fa-trash"></i>
                  </a>'
                . "</td>
              </tr>";
            } 
            echo "
          </table>
        </div>
      </div>"; 
  ?>
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>  
  </html>