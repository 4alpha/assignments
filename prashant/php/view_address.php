<?php
if(isset($_POST["submit"])) {
    include 'Address.php';
    include 'AddressDAO.php';
    $pin = $_POST['pin'];
    $village = $_POST['village'];
    $tal = $_POST['tal'];
    $dist = $_POST['dist'];
    $add = new Address($pin, $village, $tal, $dist);
    $addDAO = new AddressDAO($add);
    if(($_POST["menu"])=='getRows') {
        $result = $addDAO->getAll();
        // while($row = pg_fetch_array($result)) {
        //     print_r($row);
        // }
        echo "<table border = 1>
            <tr><th>pin</th>
            <th>village</th>
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
        $res = $addDAO->get($pin);
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
            $rows = $addDAO->delete($pin);
             printf("Affected rows:%d",$rows);
    }
}
?>