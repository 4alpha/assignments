<?php
namespace DB_Exceptions;
class UpdateException extends \Exception {
    public function errorMessage() {
        $errorMsg = "is not valid to Update...";
        return $errorMsg;
    }
}
?>