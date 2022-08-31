<?php
// On verifie que le user a selectionné une plateforms sinon error => champs obligatoire
if (!empty($tableau_propre_de_plateforms)) {
  // on met notre tableau nettoyer contre faille xss dans une variables
  $plateforms = $tableau_propre_de_plateforms;
  // on verifie que ce que le user choisit fait parti des choix disponible sinon on lui envoie un message d'erreur
  if (in_array("Switch", $plateforms) || in_array("Xbox", $plateforms) || in_array("PS4", $plateforms) || in_array("PS5", $plateforms)|| in_array("PC", $plateforms)) {
    // $error["platforms"] = [];
  } else {
    $error["platforms"] = "Les éléments ne sont pas dans le tableau !";
  }
} else {
  $error["platforms"] = $errorMessage;
}
