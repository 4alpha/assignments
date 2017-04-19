<?php
  $db_connect = pg_connect("host = localhost dbname = testdb user = postgres password = psql") or die('connection failed');
  $result = pg_query($db_connect,"SELECT * from departments");
  $ans = pg_fetch_all($result);
  $select = '<select multiple id="departmentNames" name="departments[]">';
  foreach ($ans as $dept) {
    $select.='<option value="' . $dept['dept_no'] . '">' . $dept['dept_name'] . '</option>';
  }
  $select.='</select>';
  echo( $select); 
?>