<?php
function debug_array(array $arr)
{
  echo "<pre>";
  print_r($arr);
  echo "</pre>";
}

function clear_xss($var)
{
  return trim(htmlspecialchars($var));
}

// function for clear array value
function clear_xss_array(array $arrs)
{
   $assAR = [];
  foreach ($arrs as $arr) {
    $assAR[] = trim(htmlspecialchars($arr));
  }
}

function redirect(string $url): void
{
  $_SESSION["success"] = "Jeux ajouté avec succès";
  header("Location: $url ");
  die;
}
