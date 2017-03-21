<?php
namespace ExceptionClass;
class DatabaseConnectionError extends \Exception {
  function __construct($errorMessage) {
    //echo $errorMessage;
    parent::getMessage($errorMessage);
  }
}
?>