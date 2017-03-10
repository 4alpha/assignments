<?php
  class DeleteRecordException extends Exception {
    public function getErrorMessage($dbcon) {
      $errormsg = 'Record not deleted successfully : id not found <b>OR</b> Error on line '.$this->getLine().' in '.$this->getFile()
                  .': <b>'.$this->getMessage().'</b> '.pg_last_error($dbcon);
      return $errormsg;
    }
  }
?>
" "