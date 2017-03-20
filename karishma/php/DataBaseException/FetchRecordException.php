<?php
namespace DataBaseException;

class FetchRecordException extends \Exception {
    function getRowException() {
      return "<br> Exception in fetch record ";
    }
}
?>


