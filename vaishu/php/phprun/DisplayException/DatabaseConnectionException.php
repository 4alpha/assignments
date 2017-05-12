<?php
   namespace DisplayException;
   
  class DatabaseConnectionException extends \Exception {
    function connectionDie() {
      echo "connection die check username,password,database name and host name ";
    }
  }
?>