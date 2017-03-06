<?php
if(isset($_POST["submit"])) {
    include 'employee.php';
    include 'employeeDAO.php';  
    $emp_no = $_POST['emp_no'];
    $emp_name = $_POST['emp_name'];
    $emp_address = $_POST['emp_address'];
    $DOB = $_POST['DOB'];
    $emp = new Employee($emp_no, $emp_name, $emp_address, $DOB);
    $empDAO = new EmployeeDAO($emp);
    if(($_POST["menu"])=='getRows') {
        $result = $empDAO->getAll();
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
        } echo "</table>";       
    }
    if(($_POST["menu"])=='get') {
        $res = $empDAO->get($emp_no);
            $arr = pg_fetch_all($res);
            print_r($arr);
    }    
    if($_POST["menu"]=="add") {
          $rows =$empDAO->add($emp);
          printf("Affected rows:%d",$rows); 
    }
    if($_POST["menu"]=="update") {
          $rows = $empDAO->update($emp);
           printf("Affected rows:%d",$rows);
    }
    if($_POST["menu"]=="delete") {
            $rows = $empDAO->delete($emp_no);
             printf("Affected rows:%d",$rows);
    }
}
?>