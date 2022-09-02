<?php
require_once("src/game.php");

class Model
{
  protected $pdo;

  public function __construct()
  {
    $this->pdo = getPDO();
  }
}
