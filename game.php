<?php
require("src/game.php");
require_once("src/models/Game.php");
$model = new Game();
$id = $model->getId();
$game = $model->get($id);

require("templates/gamePage.php");
