<?php
  namespace ExceptionNamespace;

  class FetchRecordException extends \Exception {
    public function getRowErrorMessage() {
      return "Id not found, " . "error in line " . $this->getLine();
    }  
  }
?>