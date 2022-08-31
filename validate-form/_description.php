<?php
if (!empty($description)) {
  if (strlen($description) <= 30) {
    $error["description"] = "<span class=text-danger>*30 caractères minimum</span>";
  } elseif (strlen($description) > 300) {
    $error["description"] = "<span class=text-danger>*300 caractères maximum</span>";
  }
} else {
  $error["description"] = $errorMessage;
}
