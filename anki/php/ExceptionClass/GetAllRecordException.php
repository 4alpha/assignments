<?php
namespace ExceptionClass;
class GetAllRecordException extends \Exception {
  public function getErrorMessage() {
    $getErrorMsg = "Query failed : Error on line " . $this->getLine() . " in " . $this->getFile() . ": <b>" . $this->getMessage();
    return $getErrorMsg;
  }
}
?>
