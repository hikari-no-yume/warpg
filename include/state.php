<?php

class State {
    public $charX;
    public $charY;
    
    public function __construct($charX = 7, $charY = 7) {
        $this->charX = $charX;
        $this->charY = $charY;
    }
    
    public function getPos() {
        return "$this->charX,$this->charY";
    }
}