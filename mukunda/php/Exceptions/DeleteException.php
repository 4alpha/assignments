<?php
  namespace Exceptions;

  class DeleteException extends \Exception {
    public function getDeleteErrorMessage() {
      return "Id not found, " . "error in line " . $this->getLine();
    }
  }
?>