<?php
// require("src/game.php");
require_once('controllers/Game.php');
$controller = new \Controllers\Game();
$controller->show();