<?php
  setEnv('variables_order','EGPCS');
   echo getenv('variables_order');
   error_reporting(E_ALL);
                    ini_set('display_errors', 1);
  ini_set('variables_order','EGPCS');
 echo ini_get('variables_order');
//print_r($_ENV);
 $_ENV["SERVER_NAME"]=$_SERVER["SERVER_NAME"];
 $_ENV["REMOTE_PORT"]=$_SERVER["REMOTE_PORT"];
 print_r($_ENV);
 echo "<br>".$_ENV["SERVER_NAME"];
//echo $_SERVER['SERVER_NAME'];
//echo $_SERVER["SERVER_NAME"];
//echo $_ENV['SERVER_NAME'];
?>