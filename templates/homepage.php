<?php
$title = "Accueil"; // title for current page 
ob_start();
// <!-- main-content -->
require('partials/_home.php');
$content = ob_get_clean();
require('layout.php');
