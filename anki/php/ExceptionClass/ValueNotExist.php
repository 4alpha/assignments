<?php
namespace ExceptionClass;
class ValueNotExist extends \Exception {
  public function getErrorMessage() {
    $idValueDoesNotExist = "Record does not exist Or Fill all values : Error on Line " . $this->getLine() . " in " . $this->getFile(). ": <b>" . $this->getMessage();
    return $idValueDoesNotExist;
  }
}
?>