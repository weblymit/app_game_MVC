<?php
$pegiArr = [
  ["name" => 3],
  ["name" => 7],
  ["name" => 12],
  ["name" => 16],
  ["name" => 18],
]

?>
<div class="">
  <h2 class="font-semibold text-blue-900 pt-4 pb-2">PEGI</h2>
  <select class="select select-bordered w-full max-w-xs" name="pegi">
    <option disabled selected>Choose ?</option>
    <?php foreach ($pegiArr as $pegi) : ?>
      <option value="<?= $pegi["name"] ?>" <?php echo $game["PEGI"] ?
                                              'selected="selected"' : "";
                                            ?>><?= $game["PEGI"] ?></option>
    <?php endforeach ?>
  </select>
</div>
<p>
  <?php
  if (!empty($error["pegi"])) {
    echo $error["pegi"];
  }
  ?>
</p>