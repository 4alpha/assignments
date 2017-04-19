<?php
  namespace AppExceptions;
  
  class GetAllRecordException extends \Exception {
    public function getErrorMessage($message) {
      $errorMesaage = 'Query failed table not found OR Error on line ' . $this->getLine() . ' in ' . $this->getFile()
                      . ': <b>' . $this->getMessage() . '</b>' . $message;
      return $errorMesaage;
    }
  }  
?>