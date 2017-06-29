<?php

class Game
{
    private $arrCode;
    private $arrNumber;
    private $pines = ["#", "#", "#", "#"];

    public function __construct($code, $number)
    {
        $this->arrCode = str_split(strval($code));
        $this->arrNumber = str_split(strval($number));
    }

    private function isWhite($position)
    {
        foreach ($this->arrCode as $index => $digit) {
            if (($this->pines[$index] == "#" || $this->pines[$index] == "B") &&
                $digit == $this->arrNumber[$position]) {
                return $index;
            }
        }

        return -1;
    }

    public function make()
    {
        // Pines negros
        foreach ($this->arrCode as $index => $digit) {
            if ($digit == $this->arrNumber[$index]) {
                $this->pines[$index] = "N";
            }
        }

        // Pines blancos
        foreach ($this->arrCode as $index => $digit) {
            if ($this->pines[$index] == "#") {
                $pos = $this->isWhite($index);
                if ($pos >= 0) {
                    $this->pines[$index] = "B";
                }
            }
        }

        return $this->pines;
    }
}