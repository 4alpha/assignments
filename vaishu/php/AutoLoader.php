<?php
    use Configration\Config as Config;
    include_once 'Controller.php';
    function __autoload($class) {
            $class = str_replace("\\", "/", $class . ".php") ;
            // echo $class."<br>";
            if (file_exists($class)) {
                require_once($class);
            }
    }

?>