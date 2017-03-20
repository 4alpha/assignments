<?php
  namespace AppExceptions;
  
  class DatabaseConnectionException extends \Exception {
    public function getErrorMessage($connection) {
      $errormsg = 'Connection not established <b>OR</b> Error on line' . $this->getLine() . ' in ' . $this->getFile()
                  . ': <b>' . $this->getMessage() . '</b> ' . pg_last_error($connection);
      return $errormsg;
    }
  }
?>