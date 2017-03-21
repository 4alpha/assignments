<?php
namespace ExceptionClass;
class DatabaseConnectionError extends \Exception {
  function __construct($errorMessage) {
    parent::getMessage($errorMessage);
  }
}
?>