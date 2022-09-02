<div class="py-16 wrap__content">
  <!-- head content -->
  <div class="wrap__content-head text-center">
    <div class="">
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
            <th>Identifiant</th>
            <th>E-mail</th>
            <th>Voir</th>
            <th>Supprimer</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $index = 1;
          if (count($users) == 0) {
            echo "<tr><td class=text-center>Aucun user disponible actuellement</td></tr>";
          } else { ?>
            <?php foreach ($users as $user) : ?>
              <tr class="hover:text-blue-400">
                <th><?= $index++ ?></th>
                <td>
                  <a href="user-show.php?id=<?= $user['id'] ?>">
                    <?= $user['pseudo'] ?>
                  </a>
                </td>
                <td><?= $user['email'] ?></td>
                <td>
                  <a href="user.php?pseudo=<?= $user['id'] ?>">
                    <img src="img/loupe.png" alt="loupe" class="w-4">
                  </a>
                </td>
                <td>
                  <?php include("partials/_modal-delete.php") ?>
                </td>
              </tr>
            <?php endforeach ?>
          <?php } ?>
        </tbody>

      </table>
    </div>
  </div>
</div>