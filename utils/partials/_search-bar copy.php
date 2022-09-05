<?php
$ql = "SELECT * FROM jeux ORDER BY name";
$searches = $pdo->query($sql);
if (isset($_GET["search"]) && !empty($_GET["search"])) {
  $recherche = clear_xss($_GET["search"]);
  //1-  Query to get all games by search
  $sql = 'SELECT * FROM jeux WHERE name LIKE "%' . $recherche . '%" ORDER BY name';
  $games = $pdo->query($sql);
}
?>
<form action="" method="get">
  <input type="search" name="search" placeholder="recherche..." class="input input-bordered w-full max-w-xs input-md">
  <input type="submit" name="valider" value="valider" class="btn bg-blue-500 btn-md">
</form>
<div class="">
  <!-- <?php
  if ($searches->rowCount() > 0) {
    while ($search = $searches->fetch()) { ?>
      <p><?= $search["name"] ?></p>
    <?php }
  } else { ?>
    <p>Aucun jeux trouvé</p>

  <?php }
  ?> -->
</div>