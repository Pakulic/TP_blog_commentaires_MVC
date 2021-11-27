<?php

namespace Controllers;

include 'Models/Post.php';
include 'Models/Comment.php';
include 'libs/render.php';


class Post
{
  //récupère tous les posts associés à l'id

  public function controlGetPost($id)
  {
    $post = new \Models\Post();
    $donneepost = $post->getPost($id);
    return $donneepost;
  }

  // j'affiche la page d'accueil et renvoie "la liste des vides est vide" si pas de post

  public function index()
  {
    $post = new \Models\Post();
    $donneepost = $post->getAllPost();
    if ($donneepost != '') {
      $pageTitle = 'Accueil';
      render('index', [
        'pageTitle' => $pageTitle,
        'post' => $donneepost
      ]);
    } else {
      throw new \Exception("la liste des posts est vide");
    }
  }

  // affiche le détail d'un post avec ses commentaires
  public function viewPost()
  {
    //récupère les données du modèle
    $comment = new \Models\Comment();
    //récupère les commentaires correspondant à l'id du post
    $donneecomment = $comment->getComment($_GET['id']);
    //récupère les données qui correspondent à l'id du post
    $donneepost = $this->controlGetPost($_GET['id']);
    // si l'id existe et les données ne sont pas vides alors on affiche la vue de la page
    if (isset($_GET['id']) && $donneepost != '') {
      $pageTitle = 'Détail du post';
      render('viewPost', [
        'pageTitle' => $pageTitle,
        'comment' => $donneecomment,
        'post' => $donneepost
      ]);
    } else {
      // sinon on rend l'erreur => l'id n'existe pas
      throw new \Exception("ce post n'existe pas");
    }
  }

  //méthode pour afficher la vue du formulaire d'ajout de commentaires
  public function formAddComments()
  {
    $pageTitle = 'Formulaire d\ajout de commentaire';
    render('formAddComment', ['pageTitle' => $pageTitle]);
  }

  //méthode pour afficher la vue du formulaire d'une page d'erreur 404 (test)

  public function erreurPageNonTrouvee()
  {
    render('404');
  }
}
