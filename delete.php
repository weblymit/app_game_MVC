<?php
// demarre session
session_start();
require_once("src/models/Game.php");
$model = new Game();
$game = $model->delete();
