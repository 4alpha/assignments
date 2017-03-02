<?php
if(isset($_POST["submit"])) {
    include 'Address.php';
    include 'postgresDB.php';
    include 'AddressDAO.php';
    $PIN = $_POST['pin'];
    $Village = $_POST['village'];
    $Tal = $_POST['tal'];
    $Dist = $_POST['dist'];
    $db = new Postgres();
    $add = new Address($PIN, $Village, $Tal, $Dist);
    $addDAO = new AddressDAO($db, $add);
    if(($_POST["menu"])=='getRows') {
        $result = $addDAO->getAll();
        // while($row = pg_fetch_array($result)) {
        //     print_r($row);
        // }
        echo "<table border = 1>
            <tr><th>PIN</th>
            <th>Village</th>
            <th>Taluka</th>
            <th>Dist</th></tr>
            ";
    while ($row = pg_fetch_array($result)) {
        echo "<tr>
                <td>". $row['pin']."</td>
                <td>".$row['village']."</td>
                <td>".$row['tal']."</td>
                <td>".$row['dist']."</td>
            <tr>";
        } echo "</table>";
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