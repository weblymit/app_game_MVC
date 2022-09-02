<?php
require_once("src/models/Model.php");
class Game extends Model
{
  
  /**
   * Return list of games order by name
   *
   * @return array
   */
  public function getAll(): array
  {
    $sql = "SELECT * FROM jeux ORDER BY name";
    $query = $this->pdo->prepare($sql);
    $query->execute();
    $games = $query->fetchAll();

    return $games;
  }

  /**
   * Return one game by id
   * @param int $id
   */

  public function get(int $id)
  {
    $sql = "SELECT * FROM jeux WHERE id= :id";
    $query = $this->pdo->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $game = $query->fetch();

    if (!$game) {
      $_SESSION["error"] = "This game is not available !";
      header("Location: index.php");
    }

    return $game;
  }

  /**
   * Delete one game
   *
   * @return void
   */
  function delete(): void
  {
    //Recupere id dans URL et je nettoie
    $id = clear_xss($_GET["id"]);
    $sql = "DELETE FROM jeux WHERE id=?";
    $query = $this->pdo->prepare($sql);
    $query->execute([$id]);
    //redirect
    $_SESSION["success"] = "Le jeu est bien supprimé !";
    header("Location: index.php");
  }

  /**
   * Update one game
   *
   * @param integer $id
   * @param array $error
   * @return void
   */
  function update(int $id, array $error): void
  {
    require_once("validate-form/form_validate.php");
    // debug_array($error);

    //4- if no error
    if (count($error) == 0) {
      //a) ecriture de la requette
      $sql = "UPDATE jeux SET name = :name, price = :price, genre = :genre, note = :note,plateforms = :plateforms,description = :description,PEGI = :PEGI, updated_at= NOW() WHERE id = :id";
      //b) preparation de la requête
      $query = $this->pdo->prepare($sql);
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

  /**
   * Create game in DB
   *
   * @param string $errorMessage
   * @param array $error
   * @return void
   */
  function create(string $errorMessage, array $error): void
  {
    require_once("validate-form/form_validate.php");
    // debug_array($error);
    //4- if no error
    if (count($error) == 0) {
      //a) ecriture de la requette
      $sql = "INSERT INTO jeux(name, price, genre, note, plateforms, description, PEGI,created_at) VALUES(:name, :price, :genre, :note,:plateforms,:description,:PEGI, NOW())";
      //b) preparation de la requête
      $query = $this->pdo->prepare($sql);
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
  /**
   * Get the id of game
   *
   * @return integer
   */
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
}
