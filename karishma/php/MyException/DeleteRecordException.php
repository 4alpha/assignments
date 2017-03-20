<?php
namespace MyException;

class DeleteRecordException extends \Exception {
    function deleteException() {
       return "<br> exception : Invalid Data" . "<br>";
    }
} 
 ?>
