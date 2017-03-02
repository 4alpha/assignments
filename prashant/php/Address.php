<?php
class Address {
    var $Village;
    var $Tal;
    var $Dist;
    var $PIN;
    function __construct($PIN, $Village, $Tal, $Dist) {
        $this->Village = $Village;
        $this->Tal = $Tal;
        $this->Dist = $Dist;
        $this->PIN = $PIN;
    }    
}