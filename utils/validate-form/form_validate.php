<?php
// 2 faille xss
require_once("_clear_input.php");
require_once("_name.php");
require_once("_price.php");
require_once("_note.php");
require_once("_description.php");
require_once("_genre.php");
require_once("_plateforms.php");
if (empty($pegi)) {
  $error["pegi"] = $errorMessage;
}
