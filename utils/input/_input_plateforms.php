<?php
$platformArray = [
  ["name" => "Switch", "checked" => "checked"],
  ["name" => "Xbox"],
  ["name" => "PS4"],
  ["name" => "PS5"],
  ["name" => "PC"],
]
?>
<h2 class="font-semibold text-blue-900">Plateforme</h2>
<div class="mt-2 mb-3 flex space-x-6">
  <?php foreach ($platformArray as $platform) : ?>
    <div class="flex item-center space-x-3">
      <label><?= $platform["name"] ?></label>
      <input type="checkbox" name="platforms[]" class="checkbox" value="<?= $platform["name"] ?>" <?php if (!empty($_POST["platforms"])) {
                                                                                                    if (in_array($platform["name"], $_POST["platforms"])) {
                                                                                                      echo "checked";
                                                                                                    };
                                                                                                  } ?> />
    </div>
  <?php endforeach ?>
</div>
<p>
  <?php
  if (!empty($error["platforms"])) {
    echo $error["platforms"];
  }
  ?>
</p>