<?php


require_once ('Engine.php');
require_once ('Transmission.php');


class Car{
    use Engine;

    function __construct($horsePow = 10){
        $this -> horsePow = $horsePow;
    }

    public function move ($distance, $speed, $direction) {
        $this -> turnEngOn();
        $this -> turnGear($speed, $direction);
        $this -> engWork($distance, $speed);
        $this -> turnNeutralGear();
        $this ->turnEngOff();
    }

}