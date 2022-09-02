<?php
require("helpers/functions.php");
/**
 * Retourne une connexion a la BDD
 * @return PDO
 */
function getPDO(): PDO
{
  // je créee mes variables
  $serveur = "localhost";
  $dbname = "app_game";
  $login = "root";
  $password = "root"; // or ""

  try {
    $pdo = new PDO("mysql:host=$serveur;dbname=$dbname", $login, $password, array(
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
      // Ne pas recuperer les elements dupliqués
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
      // Pour afficher les error
      PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    ));
    // affiche message ok connexion
    // echo "Connexion établie !";
    return $pdo;
  } catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
  }
}

function getAllGames(): array
{
  $pdo = getPDO();
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
  }

  return $games;
}

function getGame(int $id)
{
  $pdo = getPDO();
  // 3- faire la query vers BDD
  $sql = "SELECT * FROM jeux WHERE id= :id";
  // 4- Préparation de la query
  $query = $pdo->prepare($sql);
  // 5- Securise la query contre injection sql
  $query->bindValue(':id', $id, PDO::PARAM_INT);
  // 6 Execute la requette vers la BDD
  $query->execute();
  // 7- On stock tous dans une variable
  $game = $query->fetch();
  // debug_array($game);
  // $game = [];

  if (!$game) {
    $_SESSION["error"] = "This game is not available !";
    header("Location: index.php");
  }

  return $game;
}

function updateGame(int $id, array $error): void
{
  require_once("validate-form/form_validate.php");
  // debug_array($error);

  //4- if no error
  if (count($error) == 0) {
    $pdo = getPDO();
    //a) ecriture de la requette
    $sql = "UPDATE jeux SET name = :name, price = :price, genre = :genre, note = :note,plateforms = :plateforms,description = :description,PEGI = :PEGI, updated_at= NOW() WHERE id = :id";
    //b) preparation de la requête
    $query = $pdo->prepare($sql);
    //c) Protection des injections SQL en associant chaque requette à sa valeur
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->bindValue(':name', $nom, PDO::PARAM_STR);
    $query->bindValue(':price', $prix, PDO::PARAM_STMT);
    // genre est un tableau, on boucle pour bindValue chaque valuer
    $query->bindValue(':genre', implode(" | ", $tableau_propre_de_genre), PDO::PARAM_STR);
    $query->bindValue(':plateforms', implode(" | ", $tableau_propre_de_plateforms), PDO::PARAM_STR);
    $query->bindValue(':note', $note, PDO::PARAM_INT);
    $query->bindValue(':description', $description, PDO::PARAM_STR);
    $query->bindValue(':PEGI', $pegi, PDO::PARAM_STR);
    //d) execution de la requête preparé
    $query->execute();
    // redirection vers page accueil
    redirect('index.php');
    $_SESSION["success"] = "Jeux ajouté avec succès";
    // header("Location: index.php");
    // die;
  }
}

function createGame(string $errorMessage, array $error): void
{
  require_once("validate-form/form_validate.php");
  // debug_array($error);
  //4- if no error
  if (count($error) == 0) {
    $pdo = getPDO();
    //a) ecriture de la requette
    $sql = "INSERT INTO jeux(name, price, genre, note, plateforms, description, PEGI,created_at) VALUES(:name, :price, :genre, :note,:plateforms,:description,:PEGI, NOW())";
    //b) preparation de la requête
    $query = $pdo->prepare($sql);
    //c) Protection des injections SQL en associant chaque requette à sa valeur
    $query->bindValue(':name', $nom, PDO::PARAM_STR);
    $query->bindValue(':price', $prix, PDO::PARAM_STMT);
    // genre est un tableau, on boucle pour bindValue chaque valuer
    $query->bindValue(':genre', implode(" | ", $tableau_propre_de_genre), PDO::PARAM_STR);
    $query->bindValue(':plateforms', implode(" | ", $tableau_propre_de_plateforms), PDO::PARAM_STR);
    $query->bindValue(':note', $note, PDO::PARAM_INT);
    $query->bindValue(':description', $description, PDO::PARAM_STR);
    $query->bindValue(':PEGI', $pegi, PDO::PARAM_STR);
    //d) execution de la requête preparé
    $query->execute();
    // redirection vers page accueil
    $_SESSION["success"] = "Jeux ajouté avec succès";
    header("Location: index.php");
    die;
  }
}

function delete(): void
{
  $pdo = getPDO();
  //Recupere id dans URL et je nettoie
  $id = clear_xss($_GET["id"]);
  $sql = "DELETE FROM jeux WHERE id=?";
  $query = $pdo->prepare($sql);
  $query->execute([$id]);
  //redirect
  $_SESSION["success"] = "Le jeu est bien supprimé !";
  header("Location: index.php");
}

function getId(): int
{
  if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $id = clear_xss($_GET['id']);
  } else {
    $_SESSION["error"] = "URL invalide!";
    header("Location: index.php");
  }
  // $game = getGame($id);
  return $id;
}
