<?php
namespace MyException;

class FetchRecordException extends \Exception {
    function getRowException() {
      return "<br> Exception in fetch record ";
    }
}
?>


