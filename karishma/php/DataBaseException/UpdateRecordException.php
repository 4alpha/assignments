<?php
namespace DataBaseException;

class UpdateRecordException extends \Exception {
    function updateDataException() {
       return "<br> exception : Invalid data" . "<br>" . "$query" . "<br>";
    }
}
?>
