<?php
  $db_connection = pg_connect( "host = localhost  port = 5432 dbname = test user = postgres password = psql " );
  $query = "SELECT * FROM Department";
  
  $result = pg_query($query);
  $res = pg_fetch_all($result);
  $select = '<select id="departmentNames" multiple="multiple" name="department[]">';
  foreach($res as $row){
    $select.='<option  value="' .$row['d_no'].'">' . $row['d_name'] . '</option>';          
  }
  $select.='</select>';  
  echo $select;    
?>