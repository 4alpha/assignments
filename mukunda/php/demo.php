<?php
  $db_connection = pg_connect( "host = localhost  port = 5432 dbname = test user = postgres password = psql " );
  $query = "SELECT * FROM Department";
  
  $result = pg_query($query);
  $res = pg_fetch_all($result);
  $select = '<select id="selectDept" multiple="multiple" name="department[]">';
          foreach($res as $row){
           $select.='<option  value="' .$row['d_no'].'">' . $row['d_name'] . '</option>';       
          }
           $select.='</select>';
         echo $select;
         
  // $employeeNumber = $_POST['emp_no'];
  // $name = $_POST['name'];
  // $gender = $_POST['gender'];

  // $query = pg_query("insert into emp(e_no, name, gender) values ($emp_no, '$name', '$gender')");
  // echo "Form Submitted Succesfully";

?>