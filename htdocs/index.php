<?php

require_once '../include/map.php';
require_once '../include/state.php';

$currentMap = $grassyHills;

session_start();

header('Content-Type: text/html;charset=utf-8');

if (!isset($_SESSION['state'])) {
    $_SESSION['state'] = new State();
}
$state = $_SESSION['state'];

switch (isset($_GET['action']) ? $_GET['action'] : NULL) {
    case 'click':
        if ($_GET['what'] === 'map') {
            $state->charX = (int)$_GET['x'] % 16;
            $state->charY = (int)$_GET['y'] % 16;
        } else if ($_GET['what'] === 'entity') {
            echo "<script>alert(\"Suicide is not allowed in this game.\");</script>";
        }
        /* redirect so refreshing wouldn't redo action */
        header('Location: /');
        header('HTTP/1.1 303 See Other');
    break;
    default:
    break;
}

?><!doctype html>
<meta charset=utf-8>
<title>warpg</title>
<link rel=stylesheet href=style.css>

<?php renderMap($currentMap, [
    $state->getPos() => new Entity("grassman", "@")
]); ?>