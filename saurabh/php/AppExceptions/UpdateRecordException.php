<?php
  namespace AppExceptions;
  
  class UpdateRecordException extends \Exception {
    public function getErrorMessage($dbconnection) {
      $errormsg = 'Record not updated : Error on line ' . $this->getLine() . ' in ' . $this->getFile()
                  . ': <b>' . $this->getMessage() . '</b>' . pg_last_error($dbconnection);
      return $errormsg;
    }
  }
?>