<?php
class ValueNotExist extends Exception {
  public function valueNotExist() {
    $idValueDoesNotExistMsg = "No. does not exist Or Fill all values !!";
    return $idValueDoesNotExistMsg;
  }
}
?>