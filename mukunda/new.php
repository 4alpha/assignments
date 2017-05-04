<?php
echo "hello";
//echo phpinfo();
print_r(get_loaded_extensions());
echo "<br>";
$fp = tmpfile();
var_dump(get_resources());
$ip = getenv('REMOTE_ADDR');
echo  $ip."<br>";
$id=getmyinode();
echo $id."<br>";
echo memory_get_usage() . "\n";
echo sys_get_temp_dir();
?>
