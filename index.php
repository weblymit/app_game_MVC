<?php
// session_start();
$title = "Accueil"; // title for current page 
require("src/model.php");
// require("utils/render_view.php");
$games = getGames();

require("templates/homepage.php");
// render('homepage/_home', ['title' => $title, 'games' => $games]);
