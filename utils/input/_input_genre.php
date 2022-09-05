 <?php
  $genreArray = [
    ["name" => "Aventure", "checked" => "checked"],
    ["name" => "Course"],
    ["name" => "FPS"],
    ["name" => "RPG"],
  ]
  ?>
 <h2 class="font-semibold text-blue-900">Genre</h2>
 <div class="mt-2 mb-3 flex space-x-6">
   <?php foreach ($genreArray as $genre) : ?>
     <div class="flex item-center space-x-3">
       <label><?= $genre["name"] ?></label>
       <input type="checkbox" name="genre[]" class="checkbox" value="<?= $genre["name"] ?>" <?php
                                                                                            if (!empty($_POST["genre"])) {
                                                                                              if (in_array($genre["name"], $_POST["genre"])) echo "checked";
                                                                                            } ?> />
     </div>
   <?php endforeach ?>
 </div>
 <p>
   <?php
    if (!empty($error["genre"])) {
      echo $error["genre"];
    }
    ?>
 </p>