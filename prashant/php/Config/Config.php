<?php
namespace Config;
        $ini = parse_ini_file("config.ini");
        $GLOBALS['driver'] = $ini['DBDRIVER'];
        $GLOBALS['host'] = $ini['HOST'];
        $GLOBALS['dbName'] = $ini['DBNAME'];
        $GLOBALS['user'] = $ini['USER'];
        $GLOBALS['password'] = $ini['PASSWORD'];
?>