<?php
class Address {
    var $village;
    var $tal;
    var $dist;
    var $pin;
    function __construct($pin, $village, $tal, $dist) {
        $this->village = $village;
        $this->tal = $tal;
        $this->dist = $dist;
        $this->pin = $pin;
    }    
}