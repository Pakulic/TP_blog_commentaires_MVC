<?php

include 'Controllers/Post.php';
include 'Controllers/Comments.php';

use \Controllers\Comments;
use \Controllers\Post;

/* déclaration des variables
 */

$controlindex = new Post();
$controlComments = new Comments();

// si la variable "action" est passée dans l'url

if (isset($_GET['action'])) {
  // et si la valeur de la variable correspond à un cas ci-dessous
  switch ($_GET['action']) {
      /*  dans le cas où la variable est égale à 'listPosts'*/
    case 'listPosts':
      // affichage de la page d'accueil (listes des posts)
      try {
        $controlindex->index();
      } catch (\Exception $e) {
        die('Erreur : ' . $e->getMessage());
      }
      break;
      /*  dans le cas où la variable est égale à 'post et si l'url contient un id est qu'il est supérieur à 0'*/
    case 'post' && isset($_GET['id']) && $_GET['id'] > 0:
      try {
        $id = $_GET['id'];
        // affichage du détail d'un post avec ses commentaires 
        $controlindex->viewPost();
        // pour visualiser la page, il faut utiliser l'url :  //http://localhost/php_debut_mvc/Exo4_commentaires_loic/index.php?action=post&id=1
      } catch (\Exception $e) {
        die('Erreur : ' . $e->getMessage());
      }
      break;

      /*  dans le cas où la variable est égale à 'formAddComment'*/
      // affichage du formulaire de contact
    case 'formAddComment':
      try {
        $controlindex->formAddComments();
      } catch (\Exception $e) {
        die('Erreur : ' . $e->getMessage());
      }
      break;

      /*  dans le cas où la variable est égale à 'addComment'*/
      // traitement du formulaire et renvoi vers la page du post avec le commentaire

    case 'addComment':
      try {
        $controlComments->controlAddComments($_GET['id']);
        $controlindex->viewPost();
      } catch (\Exception $e) {
        die('Erreur : ' . $e->getMessage());
      }
      break;
    default:
      $controlindex->erreurPageNonTrouvee();
      break;
  }
}
