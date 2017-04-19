<?php

//$GLOBALS
print_r("<h3> checking \$GLOBALS variable</h3>");
$globalVariable="Hello All";
check_global();
function check_global() {
  $globalVariable="Hello function check_global";

  echo "Global variable is :".$GLOBALS['globalVariable']."<br>";
  echo "Local Scope variable is :".$globalVariable."<br>";
}

//$_SERVER
print_r("<h3> checking \$_SERVER variable</h3>");
echo $_SERVER['SERVER_SOFTWARE']."<br>";
echo $_SERVER['SERVER_NAME']."<br>";
echo $_SERVER['REQUEST_TIME']."<br>";
echo $_SERVER['SERVER_PROTOCOL']."<br>";
echo $_SERVER['REMOTE_PORT']."<br>";
echo $_SERVER['SERVER_ADMIN']."<br>";
echo $_SERVER['SCRIPT_FILENAME']."<br>";
echo $_SERVER['HTTP_HOST']."<br>";

//$_GET
print_r("<h3> checking \$_GET variable</h3>");
$user=$_GET['user'];
$pass=$_GET['pass'];
echo $user."\t";
echo $pass."<br>";

//$_POST
print_r("<h3> checking \$_POST variable</h3>");
$user=$_POST['user'];
$pass=$_POST['pass'];
$phone=$_POST['phn'];
echo $user."\t";
echo $pass."\t";
echo $phone."<br>";

//$_REQUEST
print_r("<h3> checking \$_REQUEST variable</h3>");
$username=$_REQUEST['user'];
$password=$_REQUEST['pass'];
echo $username."\t";
echo $password."<br>";

//$_COOKIE
print_r("<h3> checking \$_COOKIE variable</h3>");
echo $_COOKIE['cookiename']."<br>";
echo $_COOKIE['cookieaddress']."<br>";
echo $_COOKIE['cookiecontact']."<br>";
echo $_POST['compname']."<br>";
echo $_POST['compaddr']."<br>";

//$_ENV
print_r("<h3> checking \$_ENV variable</h3>");
ini_set('variables_order','EGPCS');
print_r($_ENV);
echo getenv('server_name');
?>