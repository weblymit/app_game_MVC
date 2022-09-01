<?php $title = "Update"; // title for current page 
// $error = [];
// $errorMessage = "<span class='text-red-500'>*Ce champs est obligatoire</span>";
// debug_array($error);

ob_start()
?>
<section class="py-12">
  <a href="index.php" class="text-blue-500 font-light text-xs ">
    Retour </a>
  <h1 class="text-blue-500 text-5xl uppercase font-black pt-6 text-center pb-10">Modifier <?= $game["name"] ?></h1>
  <form action="" method="POST">
    <!-- input for name -->
    <div class="mb-3">
      <label for="name" class="font-semibold text-blue-900">Nom</label>
      <input type="text" name="name" class="input input-bordered w-full max-w-xs block" value="<?= $game["name"] ?>" />
      <p>
        <?php
        if (!empty($error["nom"])) {
          echo $error["nom"];
        }
        ?>
      </p>
    </div>
    <!-- input for price -->
    <div class="mb-3">
      <label for="price" class="font-semibold text-blue-900">Prix</label>
      <input type="number" step="0.01" name="price" class="input input-bordered w-full max-w-xs block" value="<?= $game["price"] ?>" />
      <p>
        <?php
        if (!empty($error["prix"])) {
          echo $error["prix"];
        }
        ?>
      </p>
    </div>
    <!-- input for genre -->
    <?php
    include_once("input/_input_update_genre.php");
    ?>
    <!-- input for note -->
    <div class="mb-3">
      <label for="note" class="font-semibold text-blue-900">Note</label>
      <input type="number" step="0.1" name="note" class="input input-bordered w-full max-w-xs block" value="<?= $game["note"] ?>" />
      <p>
        <?php
        if (!empty($error["note"])) {
          echo $error["note"];
        }
        ?>
      </p>
    </div>
    <!-- input for plateforms -->
    <?php
    include_once("input/_input_update_plateforms.php");
    ?>
    <!-- input description -->
    <div class="mt-5">
      <label for="description" class="font-semibold text-blue-900">Description</label>
      <textarea name="description" class="textarea textarea-bordered block" placeholder="Description du jeu"><?= $game["description"] ?></textarea>
      <p>
        <?php
        if (!empty($error["description"])) {
          echo $error["description"];
        }
        ?>
      </p>
    </div>
    <!-- select for PEGI -->
    <?php
    include_once("input/_input_update_pegi.php");
    ?>
    <!-- id input -->
    <input type="hidden" name="id" value="<?= $game['id'] ?>">
    <!-- submit btn -->
    <div class="mt-4">
      <input type="submit" name="submited" value="Modifier" class="btn bg-blue-500">
    </div>
  </form>
</section>
<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>