<?php
  namespace AppExceptions;
  
  class InsertRecordException extends \Exception {
    public function getErrorMessage($message) {
      $errormsg = 'Record not inserted Error on line ' . $this->getLine() . ' in ' . $this->getFile()
                  . ': <b>' . $this->getMessage() . '</b>' . $message;
      return $errormsg;
    }
  }
?>