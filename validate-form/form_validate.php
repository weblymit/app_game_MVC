<?php
// 2 faille xss
include_once("_clear_input.php");
// 3- validation de chaque input
////////////////////////////////
// name
include_once("_name.php");
//prix
include_once("_price.php");
//note
include_once("_note.php");
// description
include_once("_description.php");
//genre
include_once("_genre.php");
//plateforms
include_once("_plateforms.php");
// select pegi
if (empty($pegi)) {
  $error["pegi"] = $errorMessage;
}
