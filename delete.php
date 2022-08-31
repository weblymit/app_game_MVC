<?php
// demarre session
session_start();
include("helpers/functions.php"); // include function
// 1- connexion a ma BDD
// inclure PDO pour la connexion a la BDD dans mon script
require_once("helpers/pdo.php");
// 2- Recupere id dans URL et je nettoie
$id = clear_xss($_GET["id"]);
// 3- requette vers BDD
$sql = "DELETE FROM jeux WHERE id=?";
// 4- prepare ma query
$query = $pdo->prepare($sql);
// 5- on execute la query
$query->execute([$id]);

//6- redirection
$_SESSION["success"] = "Le jeu est bien supprimé !";
header("Location:index.php");