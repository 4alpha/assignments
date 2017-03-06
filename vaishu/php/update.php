<html>
    <body>
        <table border="1">
            <tr><td>dept_no</td><td>emp_no</td><td>dept_name</td></tr> 
<?php
$db = pg_connect('host=localhost dbname=testdb1 user=postgres password=psql');
$id =$_POST['dept_no'];
$name =$_POST['dept_name'];
$query = "update department set dept_name='$name' where dept_no='$id'";
$result = pg_query($query);
if (!$result) {
    printf ("ERROR");
    $errormessage = pg_errormessage($db);
    echo $errormessage;
    exit();
}

$sql="select * from department";
	$result=pg_query($sql) or die('query failed'.pg_last_error());
	
	while($line=pg_fetch_array($result)){
	echo "<tr><td>$line[0]</td> <td>$line[1]</td> <td>$line[2]</td></tr>"; 	
	}
  
pg_close();
?>
</table>
</body>
</html>

