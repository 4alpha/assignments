<?php 

include 'interface_db.php';
class Mysql implements DB_interface {
     function __construct() {
         echo "mysql"."<br>";
         $host ='localhost';
         $dbname ='employee';
         $user ='root';
         $password ='mysql';
        $db = mysqli_connect($host, $user, $password, $dbname) or die('Error connecting to MySQL server.');
        echo "connection";
        if( !$db ) {
            echo "error";
        } else {
            echo "conected";
        }
     }
     public function getRow( $query ) {
        $result = mysql_query( $query );
        $row = mysql_fetch_array( $result );
       print_r( $row );
        return $result;
    }
    public function add($query) {
       $result=mysql_query($query);
       return $result;
    }
   
    public function update_data($query) {
        $result = mysql_query($query);
        return $result;
    }
    public function delete($query) {
        $result1 = mysql_query ($query);
        return $result1;
       
    }
}
 $dp = new mysql();
?>