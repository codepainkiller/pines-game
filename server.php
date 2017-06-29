<?php
require_once("Game.php");

$code = $_GET['code'];
$number = $_GET['number'];

$game = new Game($code, $number);
$pines = $game->make();

header('Content-Type: application/json');

echo json_encode($pines);