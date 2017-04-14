<?php
  namespace AppExceptions;   
  
  class DeleteRecordException extends \Exception {
    public function getErrorMessage($message) {
      $errormsg = 'Record not deleted successfully : id not found <b> OR </b> Error on line ' . $this->getLine() . ' in '
                  . $this->getFile() . ': <b>' . $this->getMessage() . $message;
      return $errormsg;
    }
  }
?>
