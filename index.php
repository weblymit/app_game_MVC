<?php

/**
 * This file show Home page
 */

require_once("controllers/Game.php");
// require_once('helpers/autoloading.php');
$controller = new \Controllers\Game();
$controller->index();

