<?php
if (!empty($prix)) {
  if (!is_numeric($prix) && !is_float($prix)) {
    $error["prix"] = "<span class=text-danger>Veuillez rentrer un nombre !</span>";
  } elseif (
    $prix < 0
  ) {
    $error["prix"] = "<span class=text-danger>Veuillez rentrer un prix supérieur à 0€ !</span>";
  } elseif ($prix > 200) {
    $error["prix"] = "<span class=text-danger>Veuillez rentrer un prix inférieur à 200€ !</span>";
  }
} else {
  $error["prix"] = $errorMessage;
}
