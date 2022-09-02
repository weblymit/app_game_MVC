<?php
// require("src/game.php");
require_once("src/models/User.php");
$model = new User();
$id = $model->getId();
$user = $model->get($id);

require("templates/showOneUser.php");
