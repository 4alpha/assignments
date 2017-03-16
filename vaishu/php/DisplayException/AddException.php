<?php
  namespace DisplayException;
  class AddException extends \Exception {
    function idAlreadyExists() {
      $addExceptionErrorMessage = " id is already present to add.";
      return $addExceptionErrorMessage;
    }
  }
?>