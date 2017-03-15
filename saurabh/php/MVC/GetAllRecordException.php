<?php
  class GetAllRecordException extends Exception {
    public function getErrorMessage($dbcon) {
      $errorMesaage = 'Error on line '.$this->getLine().' in '.$this->getFile()
                      .': <b>'.$this->getMessage().'</b> '.pg_last_error($dbcon);
      return $errorMesaage;
    }
  }  
?>