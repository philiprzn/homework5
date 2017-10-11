<?php

trait Engine {
    private $engOn = false;
    private $maxTemp = 90;
    private $heatTemp = 5;
    private $heatDist = 10;
    private $coolStep = 10;


    protected $horsePow;
    protected $temperature = 0;

    protected function turnEngOn(){
        $this -> engOn = true;
        echo "Engine is ON!"."<br>";
    }

    protected function turnEngOff(){
        $this -> engOn = false;
        $this -> temperature = 0;
        echo "Engine is OFF!";
    }

    protected function coolingEng(){
        $this -> temperature -= $this -> coolStep;
        echo "Engine is cooled in" . $this -> coolStep . "degrees. <br>";
    }

    protected function engWork($dist, $speed){
        if ($this -> engOn === false){
            echo 'Turn engine ON.<br>';
            return 0;
        }
        $currentSpeed = ($this -> horsePow * 2) < $speed ? $this -> horsePow * 2 : $speed;
        if ($currentSpeed < $speed) echo 'Low ENGINE! <br>';

        echo "Start with speed $currentSpeed m/s <br>";
        $passDist = ($this -> maxTemp / $this -> heatTemp) * $this -> heatDist;

        if ($passDist < $dist) {
            echo "Passed $passDist meters. <br>";
            $this -> temperature = $this -> maxTemp;

            while ($passDist < $dist){
                $this -> coolingEng();
                $anotherStep = ($this -> maxTemp - $this -> temperature) * ($this -> heatDist / $this -> heatTemp);

                if ($anotherStep > $dist - $passDist) $anotherStep = $dist - $passDist;
                $this -> temperature += ($anotherStep / $this -> heatDist) * $this -> heatTemp;
                $passDist += $anotherStep;
                echo 'Passed' .$anotherStep. 'm. more <br>';
            }

            echo "Total distance = " .$passDist. "m. <br>";

        } else {
            echo "Passed $dist m. with no stops. <br>";
        }
    }

}