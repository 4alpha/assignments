<?php
  namespace DisplayException;
  class UpdateException extends \Exception {
    function idDoesNotExits() {
      return 'id is not present to update.';
      
    }
  }
?>