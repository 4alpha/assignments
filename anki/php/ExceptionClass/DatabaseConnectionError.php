<?php
namespace ExceptionClass;
class DatabaseConnectionError extends \Exception {
  function __construct($errorMessage) {
    parent::getMessage($errorMessage);
    // $databaseConnectionError = "Database could not connect !!" . pg_last_error($db_connect);
    // return $databaseConnectionError;
  }
}
?>