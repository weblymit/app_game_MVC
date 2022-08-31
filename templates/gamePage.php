<?php $title = "Game"; // title for current page 
ob_start()
?>
<div class="pt-16">
  <a href="index.php" class="text-blue-500 font-light text-xs ">
    Retour
  </a>
  <h1 class="text-blue-500 text-5xl uppercase font-black pt-6"><?= $game["name"] ?></h1>
  <div class="f">
    <p class="pt-4"><?= $game["description"] ?></p>
    <div class="pt-6 flex space-x-4">
      <p>Genre: <?= $game["genre"] ?></p>
      <p>Prix <?= $game["price"] ?><span class="font-bold text-blue-500"> €</span></p>
      <p>Note: <?= $game["note"] ?>/10</p>
    </div>
    <div class="pt-10 flex justify-center space-x-5">
      <a href="update.php?id=<?= $game["id"] ?>&name=<?= $game["name"] ?>" class="btn btn-success btn-md text-white">Modifier le jeux
      </a>
      <!-- <a href="delete.php?id=<?= $game["id"] ?>&name=<?= $game["name"] ?>" class="btn btn-error text-white">Supprimer jeux
      </a> -->
      <?php include("partials/_modal-delete.php") ?>
    </div>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>