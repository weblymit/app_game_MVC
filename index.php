<?php
/**
 * Ce fichier affiche la Home page 
 */
// session_start();
$title = "Accueil"; // title for current page 
require_once("src/models/Game.php");
$model = new Game();
$games = $model->getAll();

/**
 * 3- affichage
 */
require("templates/homepage.php");
