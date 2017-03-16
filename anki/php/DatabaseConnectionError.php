<?php
class DatabaseConnectionError extends Exception {
  function getDatbaseError() {
    $databaseConnectionError = "Database could not connect !!<br>";
    return $databaseConnectionError;
  }
}
?>