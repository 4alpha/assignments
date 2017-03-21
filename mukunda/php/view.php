<?php
  
  function display($result) {  
    echo "<br>";
    echo "<table border=1>";
    echo "<tr><th>id</th>
          <th>name</th>
          <th>gender<th></tr>";
    while($row = pg_fetch_assoc($result)) {
      echo "\t<tr>\n";
      foreach($row as $column){
        echo "\t\t<td>$column</td>\n";
      }
      echo "\t</tr>\n";
    }
    echo "</table>\n";    
  }

  function  displayAddress($result) {  
    echo "<br>";
    echo "<table border=1>\n";
    echo "<tr><th>id</th>
          <th>Address</th></tr>";
    while($row = pg_fetch_assoc($result)) {
      echo "\t<tr>\n";
      foreach($row as $column){
        echo "\t\t<td>$column</td>\n";
      }
      echo "\t</tr>\n";
    }
    echo "</table>\n";    
  }
?>