<?php
  function departmentService() {
    $flag = "true";
    $count = count($_POST['departments']);
    $sql = pg_query("SELECT * FROM department");
    if($count != 1) { 
      while ($rs = pg_fetch_array($sql)) { 
        foreach($_POST['departments'] as $department) {
         if ($rs['dept_no'] == $department) { 
            if ($rs['can_have_multiple_department'] == 't') {
             continue;
            } else {
              $flag = "false";
              
            }
          }
        }
      }
    } else {
      return "true";
    }
    if ($flag == "true") {
      return "true";
    } else {
      return "false";
    }
  
}
?>