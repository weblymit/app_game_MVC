<?php
$error = [];
$errorMessage = "<span class='text-red-500'>*Ce champs est obligatoire</span>";
require("src/model/game.php");
// on récupère id du jeux pour l'utiliser dans la requette
$id = getId();
$game = getGame($id);
if (!empty($_POST["submited"])) {
  updateGame($id,$error);
}

require("templates/updatePage.php");
