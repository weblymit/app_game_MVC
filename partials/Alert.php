<?php
    // je verifie que session error ou succes est vide ou pas
    if ($_SESSION["error"]) {
      include("_alert-error.php");
    } elseif ($_SESSION["success"]) {
      include("_alert-success.php");
    }
    // je vide ma variable $_SESSION["error"] pour qu'il n'affiche pas de message en creant un array vide
    $_SESSION["error"] = [];
    $_SESSION["success"] = [];
