<?php
print "env is: ".$_ENV["USER"]."<br>";
print "(doing: putenv fred)<br>";
putenv("USER=fred");
print "env is: ".$_ENV["USER"]."<br>";
print "getenv is: ".getenv("USER")."<br>";
print "(doing: set _env barney)<br>";
$_ENV["USER"]="barney";
print "getenv is: ".getenv("USER")."<br>";
print "env is: ".$_ENV["USER"]."<br>";
phpinfo(INFO_ENVIRONMENT);
?>