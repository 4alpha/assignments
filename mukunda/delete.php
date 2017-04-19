

<!DOCTYPE html>
<html>
  <body>
    <form action="delete.php" method="POST">
      Enter id:<input type="number" name="emp_no_for_delete" >
      <input type="submit" name="Delete" value="Delete">
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
  
  
   if(isset($_POST['Delete'])){
      
       $data="DELETE from employee where emp_no='$_POST[emp_no_for_delete]'";
      
       $res=pg_query($db_connection,$data);  
  
   }
  ?>

