<?php
namespace ExceptionClass;
class IDAlreadyExist extends \Exception {
  public function getErrorMessage() {
    $idAlreadyExistMsg = "No. Already exist Please enter another ID Or Fill all values !!";
    return $idAlreadyExistMsg;
  }
}
?>
