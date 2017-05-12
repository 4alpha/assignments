<?php
  namespace DisplayException;
  
  class AddException extends \Exception {
    function getErrorMessage($message) {
      $addExceptionErrorMessage = " id is already present to add." . $this->getLine() . ' in ' . $this->getFile()
      . $this->getMessage() . $message;
      return $addExceptionErrorMessage;
    }
  }
?>