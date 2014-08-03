<?php

$terrainTypes = [
    '#' => "grass"
];

$grassyHills = [
    "################",
    "################",
    "################",
    "################",
    "################",
    "################",
    "################",
    "################",
    "################",
    "################",
    "################",
    "################",
    "################",
    "################",
    "################",
    "################"
];

class Entity {
    public $type;
    public $char;
    public function __construct($type, $char) {
        $this->type = $type;
        $this->char = $char;
    }
    public function render($x, $y) {
        echo "<td class=\"entity-$this->type\"><a href=\"?action=click&what=entity&x=$x&y=$y\">$this->char</a></td>\n";
    }
}

function renderMap(array $map, array $entities) {
    global $terrainTypes;

    echo "<table id=\"map\">\n";
    foreach ($map as $y => $row) {
        echo "<tr>\n";
        for ($x = 0; $x < strlen($row); $x++) {
            if (isset($entities["$x,$y"])) {
                $entities["$x,$y"]->render($x, $y);
            } else {
                $char = $row[$x];
                echo "<td class=\"terrain-$terrainTypes[$char]\"><a href=\"?action=click&what=map&x=$x&y=$y\">$char</a></td>\n";
            }
        }
        echo "</tr>\n";
    }
    echo "</table>\n";
}