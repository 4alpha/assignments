


<!DOCTYPE html>
<html>
  <head>
    <style>
      .label{
      margin-left:05px;
      }
      .input{
      margin-left:15px;
      }
      .idInput{
      margin-left:20px;
      }
      .div{
      height:50px;
      }
      .submitButton{
        margin-top:5px;
      margin-left:45px;
      }
      .updateButton{
         margin-top:5px;
      margin-left:45px;
      }
       .deleteButton{
         margin-top:5px;
      margin-left:45px;
      }
    </style>
  </head>
  <body>
    <form action="insert.php" method="POST">
      <div class="div" >  
        <label class="label">id-no:</label>
        <input class="idInput" type="number" name="emp_no" id="emp_no" >
      </div>
      <div class="div">
        <label class="label">Name:</label>
        <input class="input" type="text" name="name" id="emp_name" >
      </div>
      <div class="div">
        <label class="label">gender:</label> 
        <input class="input" type="text" name="gender" id="gender" >
      </div>
      <input class="submitButton" type="submit" value="Insert">
 
    </form>
    <form action="update.php" method="POST"> 
        <input class="updateButton" type="submit" value="Update" name="Update">
      </form>
      <form action="delete.php" method="POST"> 
        <input class="deleteButton" type="submit" value="Delete" name="Delete"> 
     </form>
    
  </body>
</html>
<?php
  $db_connection = pg_connect("host=localhost port=5432 dbname=test user=postgres password=psql");
  if($db_connection){
    echo "connection ok";
    echo "\n";
  }else{
    echo "connection failed \n";
  }
  
  
   $dataInsert="INSERT into employee VALUES('$_POST[emp_no]','$_POST[name]','$_POST[gender]')";
  
   $updatedResult=pg_query($dataInsert);
   
   $result=pg_query("SELECT * FROM employee;");
 
  echo "<table border=1>\n";
    echo "<tr><th>id</th>
            <th>name</th>
            <th>gender<th></tr>";
  while($row=pg_fetch_assoc($result)) {
    echo "\t<tr>\n";
   
    foreach($row as $column){
      echo "\t\t<td>$column</td>\n";
    }
    echo "\t</tr>\n";
  }
  echo "</table>\n";
  pg_close($db_connection);
  
  ?>

