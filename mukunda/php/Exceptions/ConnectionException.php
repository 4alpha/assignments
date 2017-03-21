<?php
  namespace Exceptions;
  
  class ConnectionException extends \Exception {
    public function getConnectionErrorMessage() {
      return "Connection Error:database connection fail";
    }  
  }
?>