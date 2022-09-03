<?php

/**
 * Ce fichier affiche la Home page 
 */

require_once("controllers/Game.php");
$controller = new \Controllers\Game();
$controller->index();








// session_start();
// $title = "Accueil"; // title for current page 
// require_once("src/models/Game.php");
// $model = new Game();
// $games = $model->getAll("name");

/**
 * 3- affichage
 */
// require("templates/homepage.php");
