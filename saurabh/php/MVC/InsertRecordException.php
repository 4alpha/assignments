<?php
  class InsertRecordException extends Exception {
    public function getErrorMessage($dbcon) {
      $errormsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
                  .': <b>'.$this->getMessage().'</b> '.pg_last_error($dbcon);
      return $errormsg;
    }
  }
?>