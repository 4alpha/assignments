<?php
  namespace DisplayException;
  
  class DeleteException extends \Exception {
    function idDoesNotExits() {
      $deleteExceptionErrorMessage = " id is not present to delete.";
      return $deleteExceptionErrorMessage;
    }
  }
?>
