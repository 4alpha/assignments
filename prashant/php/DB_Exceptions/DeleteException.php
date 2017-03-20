<?php
  namespace DB_Exceptions;

  class DeleteException extends \Exception {
    public function errorMessage() {
      $errorMsg = " is not valid to delete...";
      return $errorMsg;
    }
  }
?>