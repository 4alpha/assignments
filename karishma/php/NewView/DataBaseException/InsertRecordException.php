<?php
namespace DataBaseException;

class InsertRecordException extends \Exception {
    function addException(){
         return "Allready present" . "<br>" . "$query" . "<br>";
    }
}
?>
