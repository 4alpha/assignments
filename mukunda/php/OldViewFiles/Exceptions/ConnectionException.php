<?php
  namespace Exceptions;
  
  class ConnectionException extends \Exception {
    public function getErrorMessage() {
      return "Connection Error:database connection fail";
    }  
  }
?>