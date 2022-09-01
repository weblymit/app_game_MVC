<?php
/**
 * Ce fichier affiche la Home page 
 */
// session_start();
$title = "Accueil"; // title for current page 
require("src/model/game.php");
// require("utils/render_view.php");
/**
 * 2- Récupération
 */
$games = getAllGames();

/**
 * 3- affichage
 */
require("templates/homepage.php");
// render('homepage/_home', ['title' => $title, 'games' => $games]);
// render('homepage/_home', compact('title','games'));
