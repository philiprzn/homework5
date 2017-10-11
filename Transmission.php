<?php

trait CommonParts {
    protected function turnReverseGear() {
        echo 'Reverse gear is ON<br>';
    }

    protected function turnNeutralGear (){
        echo 'Neutral is ON <br>';
    }
}

trait  TransmissionAuto {
    use CommonParts;

    protected function turnGear($speed, $direction) {
        if ($direction === 'forward') echo 'Programm D is ON. <br>';
        if ($direction === 'back') $this -> moveBack();
    }

}

trait TransmissionManual {
    use CommonParts;

    protected function turnGear($speed, $direction) {
        if ($direction === 'forward' || $speed <= 20) echo 'First gear is ON. <br>';
        if ($direction === 'forward' || $speed > 20) echo "Second gear is ON. <br>";
    }
}