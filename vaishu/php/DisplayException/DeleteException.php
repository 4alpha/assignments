<?php
  namespace DisplayException;
  
  class DeleteException extends \Exception {
    function getErrorMessage($message) {
      $deleteExceptionErrorMessage = " id is not present to delete." . $this->getLine() . ' in ' . $this->getFile()
      . $this->getMessage() . $message;;
      return $deleteExceptionErrorMessage;
    }
  }
?>
