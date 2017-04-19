<?php
namespace ExceptionClass;
class IDAlreadyExist extends \Exception {
  public function getErrorMessage() {
    $idAlreadyExistMsg = "Record not inserted in table : Error on line " . $this->getLine() . " in " . $this->getFile(). ": <b>" . $this->getMessage();
    return $idAlreadyExistMsg;
  }
}
?>
