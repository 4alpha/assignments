<?php
namespace MyException;

class InsertRecordException extends \Exception {
    function addException(){
         return "<br> exception : Invalid data" . "<br>" . "$query" . "<br>";
    }
}
?>
