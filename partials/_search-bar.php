<form action="" method="GET">
  <input type="text" name="search" placeholder="recherche..." class="input input-bordered w-full max-w-xs input-md" autocomplete="off" value="<?php if (!empty($_GET["search"])) echo $_GET["search"] ?>">
  <button type="submit" name="submitted_search" value="Submit" class="btn bg-blue-500 btn-md">envoyer</button>
</form>