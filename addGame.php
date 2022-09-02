<?php

/**
 * Ce fichier affiche la Home page 
 */
$error = [];
$errorMessage = "<span class='text-red-500'>*Ce champs est obligatoire</span>";
require_once("src/models/Game.php");
$model = new Game();
/**
 * 2- Create
 */
if (!empty($_POST["submited"])) {
  // require("validate-form/form_validate.php");
  $model->create($errorMessage, $error);
}
// require_once("validate-form/form_validate.php");
/**
 * 3- affichage
 */
require("templates/addPage.php");
