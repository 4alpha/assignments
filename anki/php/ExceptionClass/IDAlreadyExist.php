<?php
namespace ExceptionClass;
class IDAlreadyExist extends \Exception {
  public function getMessageForID() {
  $idAlreadyExistMsg = "No. Already exist Please enter another ID Or Fill all values !!";
  return $idAlreadyExistMsg;
  }
}
?>
