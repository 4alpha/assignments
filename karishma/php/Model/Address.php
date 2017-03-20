<?php
namespace Model;

class Address {
  public $pinCode, $localAddress ;
  function __construct($pinCode, $localAddress) {
    $this->pinCode = $pinCode;
    $this->localAddress  = $localAddress ;
  }
}

?>
