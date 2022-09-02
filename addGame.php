<?php

/**
 * Ce fichier affiche la Home page 
 */
$error = [];
$errorMessage = "<span class='text-red-500'>*Ce champs est obligatoire</span>";
require("src/models/game.php");
/**
 * 2- Create
 */
if (!empty($_POST["submited"])) {
  // require("validate-form/form_validate.php");
  createGame($errorMessage,$error);
}
// require_once("validate-form/form_validate.php");
/**
 * 3- affichage
 */
require("templates/addPage.php");
