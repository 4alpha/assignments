<?php
namespace ExceptionClass;
class DatabaseConnectionError extends \Exception {
  function getErrorMessage() {
    $databaseConnectionError = "Database could not connect !!<br>";
    return $databaseConnectionError;
  }
}
?>