<?php
  namespace AppExceptions;
  
  class UpdateRecordException extends \Exception {
    public function getErrorMessage($message) {
      $errormsg = 'Record not updated : Error on line ' . $this->getLine() . ' in ' . $this->getFile()
                  . ': <b>' . $this->getMessage() . '</b>' . $message;
      return $errormsg;
    }
  }
?>