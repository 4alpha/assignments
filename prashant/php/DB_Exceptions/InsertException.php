<?php
  namespace DB_Exceptions;

  class InsertException extends \Exception {
    public function errorMessage() {
      $errorMsg = "Some fields are filled Incorrectly; Filled  it correct ";
      return $errorMsg;
    }
  }
?>