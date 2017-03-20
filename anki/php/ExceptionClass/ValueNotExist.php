<?php
namespace ExceptionClass;
class ValueNotExist extends \Exception {
  public function getErrorMessage() {
    $idValueDoesNotExistMsg = "No. does not exist Or Fill all values !!";
    return $idValueDoesNotExistMsg;
  }
}
?>