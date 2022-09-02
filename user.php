<?php

/**
 * Ce fichier affiche la Home page 
 */
// session_start();
$title = "Accueil"; // title for current page 
require_once("src/models/User.php");
$model = new User();
$users = $model->getAll("pseudo");

/**
 * 3- affichage
 */
require("templates/userpage.php");
