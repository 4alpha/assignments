<?php

  $ini = parse_ini_file("config.ini");
  $GLOBALS['driver'] = $ini['dbdriver'];
  $GLOBALS['port'] = $ini['port'];
  $GLOBALS['host'] = $ini['host'];
  $GLOBALS['dbname'] = $ini['dbname'];
  $GLOBALS['user'] = $ini['user'];
  $GLOBALS['password'] = $ini['password'];
?>
 