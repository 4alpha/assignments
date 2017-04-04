<?php
  function checkDepartments() {
    $dbconnection = pg_connect("host = localhost dbname = employees user = postgres password = psql") or die("not connect");
    $depts = pg_query("SELECT * FROM department"); 
    $flag = "yes";
    echo count($_POST['departments']);

    while($rs = pg_fetch_array($depts)) {
      foreach($_POST['departments'] as $selectedOption) {
        if($rs['dept_no'] == $selectedOption) {
          if($rs['multi_dept'] == 't') {
            echo $selectedOption;
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
  }

?>