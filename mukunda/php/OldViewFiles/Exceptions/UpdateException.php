<?php
  namespace Exceptions;
  
  class UpdateException extends \Exception {
    public function getErrorMessage() {
      return "Id not found, " . "error in line" . $this->getLine();
    }
  }
?>