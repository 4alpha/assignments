<?php
  namespace AppExceptions;
  
  class InsertRecordException extends \Exception {
    public function getErrorMessage($dbconnection) {
      $errormsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
                  .': <b>'.$this->getMessage().'</b> '.pg_last_error($dbconnection);
      return $errormsg;
    }
  }
?>