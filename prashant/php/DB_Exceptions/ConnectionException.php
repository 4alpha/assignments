<?php
namespace DB_Exceptions;

class connectionException extends \Exception {
  public function errorMessage() {
    $errorMsg = " Unable to Connect...";
    return $errorMsg;
  }
}
?>