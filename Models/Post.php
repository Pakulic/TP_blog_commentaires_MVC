<?php

namespace Models;

include_once 'Database.php';

class Post extends Database
{

  //récupère tous les posts
  public function getAllPost()
  {
    $pdo = $this->getPdo();
    $requete = $pdo->prepare('SELECT * FROM post');
    $requete->execute(array());
    $post = $requete->fetchAll();
    return $post;
    $requete->closeCursor();
  }

  //récupère un post précis en fonction de son id
  public function getPost($id)
  {
    $pdo = $this->getPdo();
    $requete = $pdo->prepare('SELECT * FROM post WHERE post_id=:id');
    $requete->execute(['id' => $id]);
    $post = $requete->fetch();
    return $post;
    $requete->closeCursor();
  }
}
