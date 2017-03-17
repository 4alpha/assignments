<?php
namespace DB_Exceptions;
class DeleteException extends \Exception {
    public function errorMessage() {
        $errorMsg = "is not valid Employee Number to delete...";
        return $errorMsg;
    }
}
?>