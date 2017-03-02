<?php
class Address {
    private $Village;
    private $Tal;
    private $Dist;
    private $PIN;
    function __construct($Village, $Tal, $Dist, $PIN) {
        $this->Village = $Village;
        $this->Tal = $Tal;
        $this->Dist = $Dist;
        $this->PIN = $PIN;
    }
    
}