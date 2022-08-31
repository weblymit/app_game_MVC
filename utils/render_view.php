<?php

function render(string $path, array $variables = [])
{
  extract($variables);
  ob_start();
  // <!-- main-content -->
  require('templates/partials/' . $path . '.php');
  $content = ob_get_clean();
  require('templates/layout.php');
}
