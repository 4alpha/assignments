<?php
  
  function display($result) {  
    echo "<div class='container'>
           <div class='row col-lg-5'>";
    echo "<button  type='button' class='btn btn-primary pull-right'>Add Now</button>";      
    echo "<table  class='table table-bordered table-inverse'>";
    echo "<thead>
          <tr class='sm'>
          <th>id</th>
          <th>name</th>
          <th>gender</th>
          <th>Update</th>
          <th>Delete</th>
          </tr></thead>";
    while($row = pg_fetch_assoc($result)) {
      echo "<tbody>";
      echo "<tr class='sm'>";
      foreach($row as $column){
        echo "<td>$column</td>";
      }
      echo "<td><button type='button' class='btn btn-secondary btn-sm'>Edit</button></td>
           <td><button type='button' class='btn btn-danger btn-sm'>Delete</button></td>";
      echo "</tr>";
    }
    echo "</tbody></table></div>"; 
      
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
 
  function displayDepartment($result) {  
    echo "<div class='container'>
           <div class='row col-lg-5'>";
    echo "<button  type='button' class='btn btn-primary pull-right'>Add Now</button>";      
    echo "<table  class='table table-bordered table-inverse'>";
    echo "<thead>
          <tr class='sm'>
          <th>Department-id</th>
          <th>name</th>
          <th>Can have multiple departments</th>
          </tr></thead>";
    while($row = pg_fetch_assoc($result)) {
      echo "<tbody>";
      echo "<tr class='sm'>";
      foreach($row as $column){
        echo "<td>$column</td>";
      }
    }
    echo "</tbody></table></div>"; 
      
  }

?>