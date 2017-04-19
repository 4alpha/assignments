<?php
  namespace Exceptions;

  class FetchRecordException extends \Exception {
    public function getErrorMessage() {
      return "Id not found, " . "error in line " . $this->getLine();
    }  
  }
?>