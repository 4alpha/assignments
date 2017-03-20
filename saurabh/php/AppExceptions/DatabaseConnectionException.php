<?php
  namespace AppExceptions;
  
  class DatabaseConnectionException extends \Exception {
    public function getErrorMessage($dbconnection) {
      $errormsg = 'Connection not established <b>OR</b> Error on line' . $this->getLine() . ' in ' . $this->getFile()
                  . ': <b>' . $this->getMessage() . '</b> ' . pg_last_error($dbconnection);
      return $errormsg;
    }
  }
?>