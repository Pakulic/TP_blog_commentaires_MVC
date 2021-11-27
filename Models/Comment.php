<?php

namespace Models;

include_once 'Database.php';

class Comment extends Database
{
  //récupère tous les commentaires associés à l'id d'un post
  public function getComment($id)
  {
    $pdo = $this->getPdo();
    $requete = $pdo->prepare('SELECT *, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin\') AS comment_date_fr FROM comments WHERE post_id=:id ORDER BY comment_date DESC');
    $requete->execute(['id' => $id]);
    $post = $requete->fetchAll();
    return $post;
    $requete->closeCursor();
  }
}
