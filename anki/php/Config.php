<?php
$iniFile = parse_ini_file('config.ini');
$DBDRIVER = $iniFile['DBDRIVER']; 
$host = $iniFile['host']; 
$dbname = $iniFile['dbname']; 
$user = $iniFile['user'];
$password = $iniFile['password'];

?>
