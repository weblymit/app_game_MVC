<?php

namespace Controllers;

require_once("models/User.php");
require_once('Controller.php');

class User extends Controller
{
  // protected $model;

  // public function __construct()
  // {
  //   $this->model = new \Models\User();
  // }
  protected $modelName = \Models\User::class; // here by class name

  /**
   * Show homepage
   */
  public function index()
  {
    $title = "Users"; // title for current page
    $users = $this->model->getAll("pseudo");
    require("views/userpage.php");
  }
  /**
   * Show single item
   */

  public function show()
  {
    // $model = new \Models\Game();
    $id = $this->model->getId();
    $user = $this->model->get($id);
    $title = $user["pseudo"];
    //  affichage
    require("views/showOneUser.php");
  }
}
