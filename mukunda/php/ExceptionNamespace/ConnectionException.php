<?php
  namespace ExceptionNamespace;
  
  class ConnectionException extends \Exception {
    public function getConnectionErrorMessage() {
      return "<br><div style=margin-left:600px>" . "Connection Error:database connection fail" . "</div>";
    }  
  }
?>