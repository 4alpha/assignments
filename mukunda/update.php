

<!DOCTYPE html>
<html>
  <body>
    <form action="update.php" method="POST">
      Enter id:<input type="number" name="emp_no_for_update" >
      <input type="submit" name="showDetails" value="showDetails">
    </form>
  </body>
</html>
<?php
  $db_connection = pg_connect("host=localhost port=5432 dbname=test user=postgres password=psql");
  if($db_connection){
    echo "connection ok";
   
  }else{
    echo "connection failed \n";
  }
  
  if(isset($_POST['showDetails'])){
       
    $res=pg_query("SELECT * from employee where emp_no='$_POST[emp_no_for_update]'");
    $row1=pg_fetch_assoc($res);
    echo "
        <form action='update.php' method='POST'> 
          <div class='div' >  
            <label class='label'>id-no:</label>
            <input class='idInput' type='number' name='updated_emp_no' id='emp_no' value='$row1[emp_no]' >
          </div>
       
          <div class='div'>
            <label class='label'>Name:</label>
            <input class='input' type='text' name='updated_name' id='emp_name' value='$row1[name]'>
          </div>
          <div class='div'>
            <label class='label'>gender:</label> 
            <input class='input' type='text' name='updated_gender' id='gender' value='$row1[gender]' >
          </div>
          <input type='submit' name='Update' value='Update'>
        </form>";
  
   }
  
   if(isset($_POST['Update'])){
     $query=pg_query("update employee set name='$_POST[updated_name]',gender='$_POST[updated_gender]' where emp_no='$_POST[updated_emp_no]';");
     echo $query;
     if($query){
          echo "success";
      }else{
           echo "fail";
      }    
   }
   $result=pg_query("SELECT * FROM employee;");
   echo 'succes';
   echo "<table border=1>\n";
   echo "<tr><th>id</th>
            <th>name</th>
            <th>gender<th></tr>";
   while($row=pg_fetch_array($result,null,PGSQL_ASSOC)) {
     echo "\t<tr>\n";
     foreach($row as $column){
       echo "\t\t<td>$column</td>\n";
     }
     echo "\t</tr>\n";
   }
   echo "</table>\n";
  ?>
  
   
  
  

