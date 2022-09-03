<?php

namespace Controllers;
// interaction avec notre app
require_once("src/models/Game.php");
require_once('Controller.php');


class Game extends Controller
{
  // protected $model;

  // public function __construct()
  // {
  //   $this->model = new \Models\Game();
  // }
  // protected $modelName = "\Models\Game"; // here by string
  protected $modelName = \Models\Game::class; // here by class name

  /**
   * Show homepage
   */
  public function index()
  {
    $title = "Accueil"; // title for current page
    // $model = new \Models\Game();
    $games = $this->model->getAll("name");
    //  affichage
    require("templates/homepage.php");
  }

  /**
   * Show single item
   */

  public function show()
  {
    // $model = new \Models\Game();
    $id = $this->model->getId();
    $game = $this->model->get($id);
    $title = $game["name"];
    //  affichage
    require("templates/gamePage.php");
  }

  /**
   * Delete item
   */

  public function delete()
  {
    // $model = new \Models\Game();
    $game = $this->model->delete();
  }

  /**
   * Create new item
   */

  public function create()
  {
    $error = [];
    $errorMessage = "<span class='text-red-500'>*Ce champs est obligatoire</span>";
    // $model = new \Models\Game();

    if (!empty($_POST["submited"])) {
      // require("validate-form/form_validate.php");
      $this->model->create($errorMessage, $error);
    }

    require("templates/addPage.php");
  }

  public function update()
  {
    $error = [];
    $errorMessage = "<span class='text-red-500'>*Ce champs est obligatoire</span>";
    require_once("src/models/Game.php");
    // on récupère id du jeux pour l'utiliser dans la requette
    // $model = new \Models\Game();
    $id = $this->model->getId();
    $game = $this->model->get($id);
    $title = $game["name"];
    if (!empty($_POST["submited"])) {
      $this->model->update($id, $error);
    }

    require("templates/updatePage.php");
  }
}
