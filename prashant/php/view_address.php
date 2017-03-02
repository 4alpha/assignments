<?php
if(isset($_POST["submit"])) {
    include 'Address.php';
    include 'postgresDB.php';
    include 'AddressDAO.php';
    $PIN = $_POST['pin'];
    $village = $_POST['village'];
    $tal = $_POST['tal'];
    $dist = $_POST['DOB'];
    $db = new Postgres();
    $add = new Address($PIN, $village, $tal, $dist);
    $addDAO = new AddressDAO($db, $add);
    if(($_POST["menu"])=='getRows') {
        $result = $addDAO->getAll();
        echo "<table border = 1>
            <tr><th>EMP NO</th>
            <th>EMP NAME</th>
            <th>ADDRESS</th>
            <th>DOB</th></tr>
            ";
    while ($row = pg_fetch_array($result)) {
        echo "<tr>
                <td>". $row['emp_no']."</td>
                <td>".$row['emp_name']."</td>
                <td>".$row['address']."</td>
                <td>".$row['birth_date']."</td>
            <tr>";
        } echo "</table>";   ;
    }
    if(($_POST["menu"])=='get') {
        $res = $addDAO->get($PIN);
            $arr = pg_fetch_all($res);
            print_r($arr);
    }    
    if($_POST["menu"]=="add") {
          $rows =$addDAO->add($add);
          printf("Affected rows:%d",$rows); 
    }
    if($_POST["menu"]=="update") {
          $rows = $addDAO->update($add);
           printf("Affected rows:%d",$rows);
    }
    if($_POST["menu"]=="delete") {
            $rows = $addDAO->delete($PIN);
             printf("Affected rows:%d",$rows);
    }
}
?>