<div class="py-16 wrap__content">
  <!-- head content -->
  <div class="wrap__content-head text-center">
    <div class="">
      <a href="user.php" class=" link mb-5">Voir les users</a>

      <h1 class="text-blue-500 text-5xl uppercase font-black"><a href="index.php">App game</a></h1>
      <p>L'app qui repertorie vos jeux</p>
      <!-- button for add game -->
      <div class="pt-4">
        <a href="addGame.php" class="btn btn-success text-gray-100">Nouveau jeux</a>
      </div>
    </div>
    <!-- table -->
    <div class="overflow-x-auto mt-16">
      <table class="table w-full">
        <!-- head -->
        <thead>
          <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Genre</th>
            <th>Plateforme</th>
            <th>Prix</th>
            <th>PEGI</th>
            <th>Voir</th>
            <th>Supprimer</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $index = 1;
          if (count($games) == 0) {
            echo "<tr><td class=text-center>Aucun jeux disponible actuellement</td></tr>";
          } else { ?>
            <?php foreach ($games as $game) : ?>
              <tr class="hover:text-blue-400">
                <th><?= $index++ ?></th>
                <td>
                  <a href="game.php?id=<?= $game['id'] ?>&name=<?= $game['name'] ?>">
                    <?= $game['name'] ?>
                  </a>
                </td>
                <td><?= $game['genre'] ?></td>
                <td><?= $game['plateforms'] ?></td>
                <td><?= $game['price'] ?></td>
                <td><?= $game['PEGI'] ?></td>
                <td>
                  <a href="game.php?id=<?= $game['id'] ?>&name=<?= $game['name'] ?>">
                    <img src="assets/img/loupe.png" alt="loupe" class="w-4">
                  </a>
                </td>
                <td>
                  <?php include("utils/partials/_modal-delete.php") ?>
                </td>
              </tr>
            <?php endforeach ?>
          <?php } ?>
        </tbody>

      </table>
    </div>
  </div>
</div>