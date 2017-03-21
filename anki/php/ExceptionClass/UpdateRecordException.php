<?php
namespace ExceptionClass;
class UpdateRecordException extends \Exception {
  public function getErrorMessage() {
    $updateErrorMsg = "Record not updated </b>: Error on line " . $this->getLine() . " in " . $this->getFile() . ": <b>" . $this->getMessage();
    return $updateErrorMsg;
  }
}
?>
