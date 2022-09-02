<?php
require_once("src/game.php");

abstract class Model
{
  protected $pdo;
  protected $table;

  public function __construct()
  {
    $this->pdo = getPDO();
  }

  /**
   * Return list of games order by name
   *
   * @return array
   */
  public function getAll(?string $order = ""): array
  {

    $sql = "SELECT * FROM {$this->table}";

    if ($order) {
      $sql .= " ORDER BY " . $order;
    }
    $query = $this->pdo->prepare($sql);
    $query->execute();
    $items = $query->fetchAll();

    return $items;
  }

  /**
   * Return one item by id
   * @param int $id
   */

  public function get(int $id)
  {
    $sql = "SELECT * FROM {$this->table} WHERE id= :id";
    $query = $this->pdo->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $item = $query->fetch();

    if (!$item) {
      $_SESSION["error"] = "This item is not available !";
      header("Location: index.php");
    }

    return $item;
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
    $sql = "DELETE FROM {$this->table}  WHERE id=?";
    $query = $this->pdo->prepare($sql);
    $query->execute([$id]);
    //redirect
    $_SESSION["success"] = "Supprimé avec succès !";
    header("Location: index.php");
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
      // header("Location: index.php");
    }
    // $game = getGame($id);
    return $id;
  }

  
}
