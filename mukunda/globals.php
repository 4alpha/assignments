 <?php
//  $a=998;
// function display(){
  
//   $b="local variable";
//  echo "this is ".$b."\n";
//   echo "this is ".$GLOBALS['a'];
// }

// display();
// echo $_SERVER['SERVER_ADMIN'];

session_start();
/*session is started if you don't write this line can't use $_Session  global variable*/
$_SESSION["newsession"]=$a;


$a=90;
 $_SESSION["newsession"]=$a;
 //unset($_SESSION["newsession"]);
 //echo "unset";

 echo $_SESSION["newsession"]."<br>";
 
 echo $_SESSION["newsession"];  

// Example use of getenv()
$ip = getenv('REMOTE_ADDR');
echo $ip;

// Or simply use a Superglobal ($_SERVER or $_ENV)
$ip = $_ENV['REMOTE_ADDR'];
echo $ip;





?> 