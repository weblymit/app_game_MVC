<?php

/**
 * Ce fichier affiche la Home page 
 */
// session_start();
require_once("controllers/User.php");
// require_once('helpers/autoloading.php');

$controllers = new \Controllers\User();
$controllers->index();
