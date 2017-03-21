<?php
  namespace DisplayException;
  
  class UpdateException extends \Exception {
    function getErrorMessage($message) {
      $updateExceptionErrorMessage = "id is not present to update." . $this->getLine() . ' in ' . $this->getFile()
      . $this->getMessage() . $message;
      return $updateExceptionErrorMessage;
      
    }
  }
?>