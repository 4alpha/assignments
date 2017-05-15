<?php
      $dbconnection=pg_connect("host=localhost dbname=testdb1 user=postgres password=psql");
      $sql = pg_query($dbconnection,"SELECT * FROM department");

           if (pg_num_rows($sql)) {
            $select = '<select id="departments" name="departments[]" multiple required>';
            while ($rs = pg_fetch_array($sql)) {
              $select.='<option value="' . $rs['dept_no'] .'">' . $rs['dept_name'] . '</option>';
              
            }
           }
         $select.='</select>';
         echo $select;
  
      
?>