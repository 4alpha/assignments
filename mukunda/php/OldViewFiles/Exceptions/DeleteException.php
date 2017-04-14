<?php
  namespace Exceptions;

  class DeleteException extends \Exception {
    public function getErrorMessage() {
      return "Id not found, " . "error in line " . $this->getLine();
    }
  }
?>