<?php

spl_autoload_register(function ($className) {

  $className = str_replace("\\", "/", $className);
  var_dump($className);
  require_once("$className.php");
  // require_once("$className.php");
});
