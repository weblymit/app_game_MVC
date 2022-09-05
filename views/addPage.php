<?php
$title = "Add Game"; // title for current page 
$error = [];

ob_start();
require('partials/_addGameContent.php');
$content = ob_get_clean();
require('layout/layout.php');
