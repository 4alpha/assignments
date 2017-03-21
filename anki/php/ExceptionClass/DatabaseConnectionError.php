<?php
namespace ExceptionClass;
class DatabaseConnectionError extends \Exception {
  function getErrorMessage($db_connect) {
    $databaseConnectionError = "Database could not connect !!" . pg_last_error($db_connect);
    return $databaseConnectionError;
  }
}
?>