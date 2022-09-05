<?php $title = "User"; // title for current page 
ob_start()
?>
<div class="pt-16">
  <a href="index.php" class="text-blue-500 font-light text-xs ">
    Retour
  </a>
  <h1 class="text-blue-500 text-5xl uppercase font-black pt-6"><?= $user["pseudo"] ?></h1>
  <div class="f">
    <div class="pt-6 flex space-x-4">
      <p>Pseudo: <?= $user["pseudo"] ?></p>
      <p>Email <?= $user["email"] ?></p>
    </div>
    <div class="pt-10 flex justify-center space-x-5">
      <a href="update.php?id=<?= $user["id"] ?>&pseudo=<?= $user["pseudo"] ?>" class="btn btn-success btn-md text-white">Modifier
      </a>
      <?php include("partials/_modal-delete.php") ?>
    </div>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('layout/layout.php') ?>