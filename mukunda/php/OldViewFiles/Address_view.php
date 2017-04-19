<!DOCTYPE html>
<html>
  <body>
    <form method="POST" name="addressForm" onsubmit="return(validate(this));">
      <div>
        <label>Id-no:</label>  
        <input type="number" name="eno" min="1">
      </div>
      <div>
        <label>Address:</label>   
        <input type="text" name="address" id="address"> 
      </div>
      </div>
      <input type="submit" name="operation" value="add">
      <input type="submit" name="operation" value="getRow">
      <input type="submit" name="operation" value="update">
      <input type="submit" name="operation" value="delete">
      <input type="submit" name="operation" value="getAll">
      </div>
    </form>
  </body>
</html>

<script>
     var regExp = /^[A-Za-z0-9_]{1,20}$/;
      function validate(addressForm)
      {    
            if( document.addressForm.address.value == "" )
            {
              alert( "Please Enter your address!" );
              document.myForm.Name.focus() ;
              return false;
            } else if(!regExp.test(document.addressForm.address.value)){
              alert("please enter valid address");
               return false;
            }
      }
</script>


<?php  
  error_reporting('E_ALL');
  ini_set("display_errors",1);

  $_POST['View']= "Address";
   
  include 'common.php';
 
  if(isset($_POST['operation'])) {
    if($_POST['operation'] == 'add') {
      if(!$result) {
        echo "Data is not inserted";
      } else {
          echo "Data is inserted successfully";
      }
    } elseif($_POST['operation'] == 'getRow') {
        if($result == 0){
          echo $result;
        } else {
            displayAddress($result);
        }
    } elseif($_POST['operation'] == 'getAll') {
        displayAddress($result); 
    } else {
        echo $result;
    }        
  }   
?>


