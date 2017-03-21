<?php
require_once 'Config.php';
require 'controller.php';

function __autoload($classesExceptions) {
  $classesExceptions = str_replace("\\", "/", $classesExceptions. ".php");
  include_once $classesExceptions;
}
?>
