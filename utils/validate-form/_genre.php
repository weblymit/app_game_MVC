<?php
// On verifie que le user a selectionné un genre sinon error => champs obligatoire
if (!empty($tableau_propre_de_genre)) {
  // on met notre tableau nettoyer contre faille xss dans une variables
  $genres = $tableau_propre_de_genre;
  // on verifie que ce que le user choisit fait parti des choix disponible sinon on lui envoie un message d'erreur
  if (in_array("Aventure", $genres) || in_array("Course", $genres) || in_array("FPS", $genres) || in_array("RPG", $genres)) {
    // $error["genre"] = [];
  } else {
    $error["genre"] = "<span class=text-red-500>Ce champ n'existe pas</span>";
  }
} else {
  $error["genre"] = $errorMessage;
}