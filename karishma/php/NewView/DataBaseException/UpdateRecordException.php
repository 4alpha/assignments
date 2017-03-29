<?php
namespace DataBaseException;

class UpdateRecordException extends \Exception {
    function updateDataException() {
       return " Invalid " . "<br>" . "$query" . "<br>";
    }
}
?>
