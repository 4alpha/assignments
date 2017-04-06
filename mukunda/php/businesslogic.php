<?php 
  
  function checkDepartment($data) {
   
    foreach($data['department'] as $dept){
      $query = "SELECT multiple_departments FROM Department WHERE d_no = $dept";
      $result = pg_query($query);
      $res = pg_fetch_all($result);
      print_r($res);
      
    }
  }
  
  ?>