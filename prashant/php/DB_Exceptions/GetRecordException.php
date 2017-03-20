<?php
  namespace DB_Exceptions;

  class GetRecordException extends \Exception {
    public function errorMessage() {
      $errorMsg = "is not valid  to display info...";
      return $errorMsg;
    }
  }
?>