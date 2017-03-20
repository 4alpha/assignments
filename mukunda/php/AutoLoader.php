<?php
  function __autoload($classname) {
    $filename = str_replace("\\","/",$classname) .".php";
    include_once $filename;
  }
?>