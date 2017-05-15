<?php
  $ini = parse_ini_file("Config.ini");
  $GLOBALS['DBDRIVER'] = $ini['DBDRIVER'];
  $GLOBALS['HOST'] = $ini['HOST'];
  $GLOBALS['DBNAME'] = $ini['DBNAME'];
  $GLOBALS['USER'] = $ini['USER'];
  $GLOBALS['PASSWORD'] = $ini['PASSWORD'];
?>