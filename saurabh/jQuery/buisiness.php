<?php
  function checkDepartments() {
    $dbconnection = pg_connect("host = localhost dbname = employees user = postgres password = psql") or die("not connect");
    $depts = pg_query("SELECT * FROM department"); 
    $depts = pg_fetch_array($depts);
    $flag = "yes";
    if(count($_POST['departments']) != 1) {
      while($rs = pg_fetch_array($depts)) {
        foreach($_POST['departments'] as $selectedOption) {
          if($rs['dept_no'] == $selectedOption) {
            if($rs['multi_dept'] == 't') {
              continue;
            } else {
              $flag = "no";
            }
          }
        }
      }
      if($flag == "yes") {
        return "yes";
      } else {
        return "no";
      }
    } else {
      return "yes";
    }
  }

?>