<html>
    <body>
        <table border="1">
            <tr>
                <td>
                    dept_no
                </td>
                <td>
                    emp_no
                </td>
                <td>
                    dept_name
                </td>
            </tr> 
        <?php
        $db = pg_connect('host=localhost dbname=testdb1 user=postgres password=psql');
        $result = pg_query("INSERT INTO department VALUES ('$_POST[dept_no]','$_POST[emp_no]','$_POST[dept_name]');"); 
      if (!$result) {
            $errormessage = pg_last_error();
            echo "Error with query: " . $errormessage;
            exit();
        }
       $sql="select * from department";
	$result=pg_query($sql) or die('query failed'.pg_last_error());
	echo'<hr>';
	while($line=pg_fetch_array($result)){
	echo "<tr><td>$line[0]</td><td>$line[1]</td><td>$line[2]</td></tr>"; 	
	}
        pg_close();
        ?>
        </table>
    </body>
</html> 