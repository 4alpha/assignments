<?php
include_once '/home/developer/Internship/assignments/prashant/php/Config/Config.php';
include_once 'Controller.php';
function __autoload($class) {
        $class = str_replace("\\", "/", $class.".php") ;
        // echo $class."<br>";
        if (file_exists($class)) {
            require_once($class);
        }
}

?>