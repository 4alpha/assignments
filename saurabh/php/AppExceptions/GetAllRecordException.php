<?php
  namespace AppExceptions;
  
  class GetAllRecordException extends \Exception {
    public function getErrorMessage() {
      $errorMesaage = 'Error on line ' . $this->getLine() . ' in ' . $this->getFile()
                      . ': <b>' . $this->getMessage() . '</b>';// . pg_last_error($dbconnection);
      return $errorMesaage;
    }
  }  
?>