<?php
require("src/model.php");
// on récupère id du jeux pour l'utiliser dans la requette
if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
  $id = clear_xss($_GET['id']);
} else {
  $_SESSION["error"] = "URL invalide!";
  header("Location: index.php");
}
$game = getGame($id);


require("templates/updatePage.php");
