<?php

function render($file, $params = [])
{
  //j'extrais les données du tableau "params"
  extract($params);
  //je démarre le tampon memoire
  ob_clean();
  //je charge le fichier vue
  require "Template/$file.html.php";
  //je le rend dans la variable $pageContent
  $pageContent = ob_get_clean();
  //je l'affiche dans le template 'base'
  require "Template/base.html.php";
}
