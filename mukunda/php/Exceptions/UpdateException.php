<?php
  namespace Exceptions;
  
  class UpdateException extends \Exception {
    public function getUpdateErrorMessage() {
      return "Id not found, " . "error in line" . $this->getLine();
    }
  }
?>