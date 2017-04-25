<?php
  $dbconnection = pg_connect("host = localhost dbname = employees user = postgres password = psql")
                  or die("not connected");
  $result = pg_query("select * from department");
  $result = pg_fetch_all($result);
  // print_r($_POST);
  // echo "hiiiiii";
  $select= '<select multiple="multiple" id="selectDept" name="departments[]">';
          foreach($result as $rs) {
            $select .= '<li><option value="' . $rs['dept_no'] . '">' . $rs['dept_name'] . '</option></li>';
          }
          $select .= '</select>';
  echo($select);
?>