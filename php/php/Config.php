<?php
  $ini = parse_ini_file("Config.ini");
  $GLOBALS['DBDRIVER'] = $ini['DBDRIVER'];
  $GLOBALS['host'] = $ini['HOST'];
  $GLOBALS['dbname'] = $ini['DBNAME'];
  $GLOBALS['user'] = $ini['USER'];
  $GLOBALS['password'] = $ini['PASSWORD'];
?>