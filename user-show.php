<?php
// require("game.php");
require_once("controllers/User.php");
// require_once('helpers/autoloading.php');

$controllers = new \Controllers\User();
$controllers->show();
