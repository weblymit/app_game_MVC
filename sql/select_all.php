<?php
//1-  Query to get all games
$sql = "SELECT * FROM jeux ORDER BY name";
//2- Prépare la query (preformatter)
$query = $pdo->prepare($sql);
//3 - Execute ma requette
$query->execute();
//4 - stock my query in variable
$games = $query->fetchAll();

// search bar query
if (!empty($_GET["search"]) && isset($_GET["search"])) {
  $recherche = clear_xss($_GET["search"]);
  $sql = "SELECT * FROM jeux WHERE name LIKE :keyword OR genre LIKE :keyword OR plateforms LIKE :keyword ORDER BY name";
  // $sql = "SELECT * FROM jeux WHERE name LIKE :keyword OR genre LIKE :keyword OR plateforms LIKE :keyword ORDER BY name";
  // prepare query
  $query = $pdo->prepare($sql);
  $query->bindValue('keyword', '%' . $recherche . '%', PDO::PARAM_STR);
  // execute
  $query->execute();
  $results = $query->fetchAll();
  $rows = $query->rowCount();

  // debug_array($rows);
}
