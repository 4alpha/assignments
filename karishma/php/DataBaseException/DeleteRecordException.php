<?php
namespace DataBaseException;

class DeleteRecordException extends \Exception {
    function deleteException() {
       return "<br> exception : Invalid Data" . "<br>";
    }
} 
 ?>
